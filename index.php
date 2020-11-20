<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

use Source\Models\Live;
use Source\Models\Report\Access;
use Source\Models\Report\Online;

(new Access())->report();
(new Online())->report();

$getUrl = filter_input(INPUT_GET, 'url');
$setUrl = explode("/", $getUrl);

$getLive = (new Live())->findByUri("$setUrl[0]");
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=0">

        <title><?= ($getLive->title ?? SITE_NAME . " | " . SITE_SUBNAME); ?></title>
        <meta name="description" content="<?= ($getLive->description ?? SITE_DESC); ?>"/>
        <meta name="robots" content="index, follow"/>

        <script src="<?= LIVE_BASE; ?>/scripts/jquery.js"></script>
        <script src="<?= LIVE_BASE; ?>/scripts/jquery.cookie.js"></script>

        <!--[if lt IE 9]>
            <script src="<?= LIVE_BASE; ?>/scripts/html5shiv.js"></script>
        <![endif]-->

        <link rel="base" href="<?= LIVE_BASE; ?>/"/>
        <link href='https://fonts.googleapis.com/css?family=<?= GOOGLE_FONT; ?>' rel='stylesheet' type='text/css'>
        <link href="<?= LIVE_BASE; ?>/bootcss/fonticon.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= LIVE_BASE; ?>/bootcss/reset.css"/>
        <link rel="stylesheet" href="<?= LIVE_BASE; ?>/style.css"/>
        <link rel="shortcut icon" href="<?= LIVE_BASE; ?>/images/favicon.png"/>

        <!--GOOGLE-->
        <?php
        if (SITE_SOCIAL_GOOGLE):
            echo '<link rel="author" href="https://plus.google.com/' . SITE_SOCIAL_GOOGLE_AUTHOR . '/posts"/>' . "\r\n";
            echo '        <link rel="publisher" href="https://plus.google.com/' . SITE_SOCIAL_GOOGLE_PAGE . '"/>' . "\r\n";
        endif;
        ?>
        <meta itemprop="name" content="<?= ($getLive->title ?? SITE_NAME . " | " . SITE_SUBNAME); ?>"/>
        <meta itemprop="description" content="<?= ($getLive->description ?? SITE_DESC); ?>"/>
        <meta itemprop="image" content="<?= LIVE_BASE; ?>/images/default.jpg"/>
        <meta itemprop="url" content="<?= ($getLive->uri ?? LIVE_BASE); ?>/"/>

        <!--FACEBOOK-->
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?= ($getLive->title ?? SITE_NAME . " | " . SITE_SUBNAME); ?>"/>
        <meta property="og:description" content="<?= ($getLive->description ?? SITE_DESC); ?>"/>
        <meta property="og:image" content="<?= LIVE_BASE; ?>/images/default.jpg"/>
        <meta property="og:url" content="<?= LIVE_BASE; ?>/"/>
        <meta property="og:site_name" content="<?= SITE_NAME; ?>"/>
        <meta property="og:locale" content="pt_BR"/>
        <?php
        if (SITE_SOCIAL_FB):
            if (SITE_SOCIAL_FB_AUTHOR):
                echo '<meta property="fb:admins" content="' . SITE_SOCIAL_FB_AUTHOR . '" />' . "\r\n";
            endif;
            echo '        <meta property="article:author" content="https://www.facebook.com/' . SITE_SOCIAL_FB_PAGE . '" />' . "\r\n";
            echo '        <meta property="article:publisher" content="https://www.facebook.com/' . SITE_SOCIAL_FB_PAGE . '" />' . "\r\n";
        endif;
        ?>

        <!--TWIITER-->
        <meta property="twitter:card" content="summary_large_image"/>
        <?php
        if (SITE_SOCIAL_TWITTER):
            echo '<meta property="twitter:site" content="@' . SITE_SOCIAL_TWITTER . '" />' . "\r\n";
        endif;
        ?>
        <meta property="twitter:title" content="<?= ($getLive->title ?? SITE_NAME . " | " . SITE_SUBNAME); ?>"/>
        <meta property="twitter:description" content="<?= ($getLive->description ?? SITE_DESC); ?>"/>
        <meta property="twitter:image" content="<?= LIVE_BASE; ?>/images/default.jpg"/>
        <meta property="twitter:url" content="<?= ($getLive->uri ?? LIVE_BASE); ?>/"/>
    </head>
    <body>

    <main class="main_content">
        <?php
        //LEAD GATE COOKIE
        $getCookie = filter_input(INPUT_COOKIE, "activemail", FILTER_DEFAULT);
        $getEvent = filter_input(INPUT_COOKIE, "eventid", FILTER_DEFAULT);
        $getUser = filter_input(INPUT_COOKIE, "userlogged", FILTER_DEFAULT);

        //QUERY STRING
        if (empty($setUrl[0])):
            require "pages/home.php";

        elseif (!empty($getLive->mode) && empty($setUrl[1])):

            if (!$getUser || $getEvent !== $getLive->id):
                require "pages/optin.php";
            else:
                require "pages/live.php";
            endif;

        elseif (!empty($setUrl[0]) && file_exists("gates/{$setUrl[0]}.php") && !is_dir("gates/{$setUrl[0]}.php")):

            if (!$getCookie):
                header("location: " . LIVE_BASE);
            else:
                require "gates/{$setUrl[0]}.php";
            endif;

        else:
            require "pages/home.php";
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