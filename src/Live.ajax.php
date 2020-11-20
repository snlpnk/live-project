<?php

use Source\Core\Session;
use Source\Models\Chat;
use Source\Models\Lead;
use Source\Models\Live;
use Source\Models\Report\Online;
use Source\Support\ActiveCampaign;

session_start();
require dirname(__DIR__, 1) . "/vendor/autoload.php";

usleep(50000);

$jSON = null;
$Ref = explode("/", $_SERVER['HTTP_REFERER']);
$liveUri = end($Ref);

$getLive = (new Live())->findByUri($liveUri);

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($postData && $postData['callback_action']):
    $case = $postData['callback_action'];
    unset($postData['callback'], $postData['callback_action']);

    $postData = array_map('strip_tags', $postData);
    $postData = array_map('trim', $postData);

    switch ($case):

        case 'liveLead':

            if (in_array('', $postData)) {
                $jSON['trigger'] = ["error", "Favor preencha todos os campos para enviar seu contato!"];
                break;
            }

            if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                $jSON['trigger'] = ["error", "O e-mail informado não parece válido. Favor informe seu e-mail!"];
                break;
            }

            $name = $postData['fullname'];
            $email = $postData['email'];

            unset($postData);

            $referer = ($getLive ? $liveUri : "home");

            $lead = (new Lead)->find("email = :email", "email={$email}")->fetch();

            if(!$lead) {
                $lead = new Lead;
                $lead->name = $name;
                $lead->email = $email;
                $lead->source = "live_{$liveUri}";
                $lead->save();

                if (ACTIVE_CAMPAIGN) {
                    $lists = explode(',', ACTIVE_CAMPAIGN_LISTS);
                    $activeCampaign = new ActiveCampaign;
                    $activeCampaign->addActive($email, $lists, $name, null, ACTIVE_CAMPAIGN_TAGS);
                }

            }

            setcookie("activemail", base64_encode($email), strtotime("+3days"), "/");
            setcookie("userlogged", $name, strtotime("+3days"), "/");
            setcookie("eventid", $getLive->id, strtotime("+3days"), "/");

            if ($getLive) {
                (new Session())->set("authUser", $name);

                $jSON['trigger'] = ["success", "<b class='icon-heart'>Seja muito Bem-vindo(a) {$name},</b> Aguarde. Efetuando entrada na sala da aula..."];
                $jSON['reload'] = true;
                break;
            }

            $jSON['redirect'] = LIVE_BASE . "/obrigado";

            break;

        case 'sendComment':

            $chatSender = filter_input(INPUT_COOKIE, "userlogged", FILTER_DEFAULT);
            $chatHash = filter_input(INPUT_COOKIE, "activemail", FILTER_DEFAULT);

            if (empty($postData["message"])) {
                $jSON['error'] = '<p class="text-danger">Por favor, escreva um comentário antes de clicar em enviar...</p>';
                break;
            }

            $chat = new Chat();
            $chat->live_id = $getLive->id ;
            $chat->sender = $chatSender;
            $chat->hash = $chatHash;
            $chat->message = $postData["message"];
            $chat->save();

            $jSON['success'] = true;

            break;

        case 'liveLoads':

            //OFFER
            $offer = (new Live())->find("uri = :uri", "uri={$liveUri}", "offer, cta_link")->fetch();
            if ($offer->offer == 1) {
                $jSON['offer'] = $offer->cta_link;
                $jSON['success'] = true;
            } else {
                $jSON['offer'] = "0";
            }

            //USERS ONLINE
            $online = (new Online())->find("url = :url AND updated_at >= NOW() - INTERVAL 4 MINUTE", "url={$liveUri}")->count();
            $jSON['online'] = str_pad($online, 2, 0, STR_PAD_LEFT);

            //LOAD COMMENTS
            $chats = (new Chat())->find("live_id = :live", "live={$getLive->id}")->order("id DESC")->fetch(true);
            if ($chats) {
                $jSON['output'] = "";

                foreach ($chats as $chat) {

                    $getEmail = filter_input(INPUT_COOKIE, "activemail", FILTER_DEFAULT);
                    $userComment = ($getEmail == $chat->hash ? "Eu" : mb_convert_case(filter_var($chat->sender, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE));
                    $userWhen = date_fmt_app($chat->created_at);

                    $jSON['output'] .= "<div class='panel panel-default'>
                        <span class='panel-time'>{$userWhen}</span>
                        <div class='panel-heading'>
                            <b>{$userComment}:</b>
                            <span class='panel-body'>{$chat->message}</span>
                        </div>
                    </div>";
                }
            }

            //USER SESSION
            $upSession = (new Online())->findById((new Session())->online);
            $upSession->lastload = time();
            $upSession->save();

            $jSON['live'] = true;

            break;

    endswitch;

    if ($jSON):
        echo json_encode($jSON);
    else:
        $jSON['trigger'] = ["error", "<b class='icon-warning'>OPSS:</b> Desculpe. Mas uma ação do sistema não respondeu corretamente. Ao persistir, contate o desenvolvedor!"];
        echo json_encode($jSON);
    endif;

else:
    die('<br><br><br><center><h1>Acesso Restrito!</h1></center>');
endif;