<div class="main_content_background">
    <article class="event_login">
        <div class="event_login_header">
            <header class="content">
                <h1><?= $getLive->title; ?></h1>
                <p><?= $getLive->description; ?></p>
            </header>
        </div>
        <div class="event_login_embed" style="min-height: 100vh;">
            <div class="content" style="padding: 0; width: 100%; margin: 0 auto; display: flex; position: relative">

                <div class="event_play_login_form">

                    <div>
                        <img width="145" src="<?= LIVE_BASE; ?>/images/logo_light.svg" alt="<?= SITE_NAME; ?>"
                             title="<?= SITE_NAME; ?>"/>
                        <p class="title" style="margin: 10px;">Informe seus dados abaixo para entrar na sala:</p>

                        <div id="optin">
                            <form action="" class="ajax_form" name="" method="post"
                                  enctype="multipart/form-data">

                                <input type="hidden" name="callback_action" value="liveLead">

                                <input type="text" class="name" placeholder="Informe seu Nome:" name="fullname" required
                                       data-name="fullname"/>
                                <input type="email" class="email" placeholder="Informe seu E-mail:" name="email"
                                       required data-name="email"/>

                                <button class="btn btn_<?= SITE_COLOR; ?> icon-enter">Entrar</button>

                                <div class="ajax_load">
                                    <div class="ajax_load_content">
                                        <img src="<?= LIVE_BASE ?>/images/load.gif" alt="Aguarde, carregando!"
                                             title="Aguarde, carregando!"/>
                                        <p>Aguarde, validando entrada!</p>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </article>
</div>