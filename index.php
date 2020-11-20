<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Optimizer\Optimizer;
use Source\Models\Live;
use Source\Models\Report\Access;
use Source\Models\Report\Online;

(new Access())->report();
(new Online())->report();

$getUrl = filter_input(INPUT_GET, 'url');
$setUrl = explode("/", $getUrl);
$getLive = (new Live())->findByUri($setUrl[0]);

$seo = new Optimizer();
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=0">

        <?php
        $title = ($getLive->title ?? SITE_NAME . " | " . SITE_SUBNAME);
        $desc = ($getLive->description ?? SITE_DESC);
        $uri = ($getLive->uri ?? LIVE_BASE);

        echo $seo->optimize($title, $desc, $uri,LIVE_BASE . "/images/default.jpg")
            ->openGraph(SITE_NAME,"pt_BR")
            ->twitterCard(CONF_SOCIAL_TWITTER_CREATOR,CONF_SOCIAL_TWITTER_PUBLISHER,CONF_SITE_DOMAIN)
            ->publisher(CONF_SOCIAL_FACEBOOK_PAGE,CONF_SOCIAL_FACEBOOK_AUTHOR)
            ->facebook(CONF_SOCIAL_FACEBOOK_APP)
            ->render();
        ?>

        <link rel="base" href="<?= LIVE_BASE; ?>/"/>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,500,700'>
        <link rel="stylesheet" href="<?= LIVE_BASE; ?>/bootcss/fonticon.css" >
        <link rel="stylesheet" href="<?= LIVE_BASE; ?>/bootcss/reset.css"/>
        <link rel="stylesheet" href="<?= LIVE_BASE; ?>/style.css"/>
        <link rel="shortcut icon" href="<?= LIVE_BASE; ?>/images/favicon.png"/>

        <script src="<?= LIVE_BASE; ?>/scripts/jquery.js"></script>
        <script src="<?= LIVE_BASE; ?>/scripts/jquery.cookie.js"></script>

        <!--[if lt IE 9]>
        <script src="<?= LIVE_BASE; ?>/scripts/html5shiv.js"></script>
        <![endif]-->

    </head>

    <body>

    <main class="main_content">
        <?php

        //LEAD GATE COOKIE
        $getCookie = filter_input(INPUT_COOKIE, "activemail", FILTER_DEFAULT);
        $getEvent = filter_input(INPUT_COOKIE, "eventid", FILTER_DEFAULT);
        $getUser = filter_input(INPUT_COOKIE, "userlogged", FILTER_DEFAULT);

        //QUERY STRING
        if (empty($getLive)):
            require "pages/home.php";

        elseif (!empty($setUrl[0]) && file_exists("gates/{$setUrl[0]}.php") && !is_dir("gates/{$setUrl[0]}.php")):

            if (!$getCookie):
                header("location: " . LIVE_BASE);
            else:
                require "gates/{$setUrl[0]}.php";
            endif;

        else:

            if (!$getUser || $getEvent !== $getLive->id):
                require "pages/optin.php";
            else:
                require "pages/live.php";
            endif;

        endif;
        ?>

        <div class="ajax_error">
            <div class="ajax_error_modal">
                <p class="ajax_error_modal_content">{ERRO}</p>
                <span class="j_error_close btn btn_red icon-cross icon-notext"></span>
            </div>
        </div>

    </main>

    <script src="<?= LIVE_BASE; ?>/scripts/live.js?t=<?= time(); ?>"></script>

    </body>
    </html>
<?php ob_end_flush(); ?>