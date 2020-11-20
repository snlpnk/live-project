<div class="main_content_background">
    <div class="content" style="min-height: 100vh; display: flex; align-items: center;">
        <article class="main_optin">
            <header>
                <img width="145" src="<?= LIVE_BASE; ?>/images/logo_light.svg" alt="<?= SITE_NAME; ?>"
                     title="<?= SITE_NAME; ?>"/>
                <h1>Quer participar dos eventos ao vivo da <?= SITE_NAME; ?>?</h1>
                <p class="icon-info">Informe seu nome e e-mail abaixo e te avisaremos quando um novo evento for agendado:</p>
            </header>

            <div id="optin">
                <form action="" class="ajax_form" name="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="callback_action" value="liveLead">

                    <input type="text" class="name" placeholder="Informe seu Nome:" name="fullname" required
                           data-name="fullname"/>
                    <input type="email" class="email" placeholder="Informe seu E-mail:" name="email" required
                           data-name="email"/>

                    <button class="btn btn_<?= SITE_COLOR; ?> icon-envelop">Enviar</button>

                    <div class="ajax_load">
                        <div class="ajax_load_content">
                            <img src="<?= LIVE_BASE ?>/images/load.gif" alt="Aguarde, carregando!"
                                 title="Aguarde, carregando!"/>
                            <p>Aguarde, validando entrada!</p>
                        </div>
                    </div>
                </form>

            </div>

        </article>
    </div>
</div>