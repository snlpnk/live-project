<style>
    body {background-color: #F7F7F8 !important;}
    .live {width: 100%; background-color: #cdcdcd; position: relative;}

    .live_header {display: flex; width: calc(100% - 300px); background-color: #2368A2; padding: 10px 50px; align-items: center; justify-content: space-between}
    .live_header_logo_content {display: flex; align-items: center}
    .live_header_logo {margin-right: 15px; height: 41px; width: 29px;}
    .live_header_title {color: #fff; font-weight: 300}
    .live_header_title span {font-weight: 800}
    .live_header_logout a {display: flex; flex-flow: revert; color: #fff; font-size: .875em; text-decoration: none; align-items: center}

    .live_content {display: flex; width: calc(100% - 300px);}
    .live_video_content {flex-basis: 100%;}
    .live_video {background-color: #000; text-align: center; padding: 50px}

    .live_footer {background-color: #fff;padding: 20px 50px;}
    .live_footer_info {display: inline-flex;align-items: center; font-size: .875em}
    .live_footer_info {margin-right: 30px}
    .live_footer_info:last-of-type {margin-right: 0}

    .live_footer_info.live-heart::before {background: url(<?= LIVE_BASE; ?>/images/live-heart.svg); width: 25px; height: 25px; content: ""; margin-right: 5px}
    .live_footer_info.live-comments::before {background: url(<?= LIVE_BASE; ?>/images/live-comment.svg); width: 25px; height: 25px; content: ""; margin-right: 5px}
    .live_footer_info span {margin-right: 4px; font-weight: 800}
    .live_footer_description {padding: 15px 0;color: #495057;border-top: 1px solid #D9D9D9;margin-top: 15px;font-size: .95em}

    .live_call {display: none; justify-content: space-between;}
    .live_call .btn {width: 100%; text-shadow: none;font-weight: 300;font-size: 1em; padding: 6px 20px}

    .live_chat {position: fixed; right: 0; top: 0; flex-basis: 20%; background-color: #fff; height: 100vh; width: 300px; min-width: 300px}
    .live_chat_header {padding: 20px 20px; font-size: 1em; color: #fff; line-height: .975em; background-color: #1A4971; height: 61px; display: flex;align-items: center;}
    .live_chat_content {padding: 20px;font-size: .8em;height:calc(85% - 61px);overflow-y: auto;}
    .live_chat_content a {color: #6BACDA;}
    .live_chat_content::-webkit-scrollbar {width: 8px;}
    .live_chat_content::-webkit-scrollbar-track {background-color: #cdcdcd;}
    .live_chat_content::-webkit-scrollbar-thumb {background: #888;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);}
    .live_chat_content::-webkit-scrollbar-thumb:window-inactive {background: rgba(0,0,0,0.4);}
    .live_chat_content_layer {display: block; margin-bottom: 10px;}
    .live_chat_content_layer:last-of-type {margin-bottom: 0}
    .live_chat_content_layer span {font-weight: 800;color: #212429;position: relative;}
    .live_chat_content_layer.live_author span::after {background: #F4CA64; position: absolute; content: ""; left: -3px; width: calc(100% + 3px); height: 100%; z-index: -5;border-radius: 3px;-webkit-border-radius: 3px; -moz-border-radius: 3px;}

    .live_chat_content_message {color: #495057;}

    .live_chat_controls {height: 15%; display: flex; align-items: center}
    .live_chat_controls #chat {width: 100%; padding: 15px; align-items: center; justify-content: space-between;}
    .live_chat_controls input {background-color: #F1F3F5; border: none; border-radius: 5px; line-height: 2em; margin-bottom: 10px}
    .live_chat_controls button {text-shadow: none; font-size: .8em; background: #2368a2}
    .live_chat_controls .caracteres {font-size: .7em; color: #595959}
    .live_chat_controls_footer {display: flex; justify-content: space-between; align-items: center}

    .live_copy {width: calc(100% - 300px); padding: 20px 50px; background-color: #e5e5e5; color: #595959; text-align: center;font-size: .875em}

    @media(max-width: 62em){
        .live_header {width: 100%}
        .live_header_title {display: none}
        .live_content {width: 100%}
        .live_video {padding: 0}
        .live_chat {position: relative; width: 100%; height: auto}
        .live_chat_content {font-size: 1em; height: auto; padding: 20px 50px}
        .live_chat_header {display: none}
        .live_chat_content_layer {margin-bottom: 15px}
        .live_chat, .live_chat_content {display: flex; flex-direction: column-reverse}
        .live_chat_content_layer:last-of-type {margin-bottom: 15px}
        .live_chat_controls #chat {padding: 20px 50px}
        .live_footer {background-color: #fff}
        .live_copy {width: 100%}
    }
</style>

<section class="live">

    <section class="live_header">

        <div class="live_header_logo_content">
            <img class="live_header_logo" src="<?= LIVE_BASE; ?>/images/logo.svg" alt="" title="">
            <h1 class="live_header_title"><span><?= $getLive->title; ?></span></h1>
        </div>

        <div class="live_header_logout">
            <a href="<?= $getLive->uri; ?>&logout=true" class="icon-exit">Sair</a>
        </div>

    </section>

    <section class="live_content">

        <div class="live_video_content">

            <section class="live_video">
                <div class="embed-container">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/<?= $getLive->video; ?>?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>
                </div>
            </section>

            <section class="live_footer">
                <div class="live_footer_info live-heart"><span class="j_online">000</span> Online Agora</div>
                <div class="live_footer_info live-comments"><span class="j_comment">000</span> Comentários</div>

                <div class="live_footer_description"><?= $getLive->description; ?></div>

                <div class="live_call j_play_cta">
                    <a
                        class="btn btn_medium btn_blue <?= $getLive->cta_icon ? $getLive->cta_icon : '' ?>"
                        target="_blank"
                        href="<?= $getLive->offer ? $getLive->cta_link : "0" ?>"
                        title="<?= $getLive->cta_text ? $getLive->cta_text : LIVE_OFFER ?>">
                        <?= $getLive->cta_text ? $getLive->cta_text : LIVE_OFFER ?>
                    </a>
                </div>

            </section>

        </div>

    </section>

    <aside class="live_chat">

        <header class="live_chat_header">
            <h1>Bate-Papo ao Vivo</h1>
        </header>

        <div class="live_chat_content"></div>

        <div class="live_chat_controls">

            <form id="chat">
                <label for="form-message"></label>
                <input type="text" class="message-input contador" id="form-message" name="message"
                       maxlength="255" placeholder="Escreva seu comentário..."/>

                <div class="live_chat_controls_footer">
                    <span class="caracteres">255</span>
                    <button type="submit" id="form-submit" class="btn btn_blue">ENVIAR</button>
                </div>
            </form>

        </div>
    </aside>

    <footer class="live_copy">
        <p class="tagline"><?= date('Y'); ?> - Total Química Ltda, Todos os Direitos Reservados.</p>
    </footer>

</section>

<script src="<?= LIVE_BASE; ?>/scripts/reconnecting-websocket.js"></script>
<script>

    var chat_content = $('.live_chat_content');
    var conn = new ReconnectingWebSocket('wss://websocketsuperchat.herokuapp.com/wss', null, {debug: false, reconnectInterval: 3000});

    var clientInformation = {
        author: $.cookie("userlogged"),
        hash: $.cookie("activemail")
    }

    function renderMessage(message) {
        var from;
        var class_author;

        if (message.hash === clientInformation.hash) {
            from = message.author; //"Eu"
            class_author = "live_author";
        } else {
            from = message.author;
            class_author = "";
        }

        chat_content.append("<div class='live_chat_content_layer " + class_author + "'>" +
            "<div class='live_chat_content_message'><span>" + from + ":</span> " + message.message + "</div>" +
        "</div>");
        chat_content.scrollTop($(chat_content)[0].scrollHeight);
    }

    conn.onopen = function (e) {
        console.info("Connection established succesfully");
    };

    conn.onerror = function (e) {
        console.error(e);
    };

    conn.onmessage = function (e) {
        var data = JSON.parse(e.data);

        if (data.online) {
            $('.j_online').html(data.online);
        }

        if (data.comments) {
            $('.j_comment').html(data.comments);
        }

        if (data.author) {
            renderMessage(data);
        }
    };

    setInterval(() => {
        conn.send(JSON.stringify({
            "type": "LISTEN",
            "uid": clientInformation.author
        }));
    }, 10000);


    $('#chat').submit(function(event) {
        event.preventDefault();

        var message = $('input[name=message]').val();

        if(clientInformation.author.length && message.length) {
            var messageObject = {
                author: clientInformation.author,
                hash: clientInformation.hash,
                message: message.replace(/<\/?[^>]+(>|$)/g, "")
            };

            conn.send(JSON.stringify(messageObject));
            renderMessage(messageObject);

            var BASE = $('link[rel="base"]').attr('href');
            var form_data = "message=" + message + "&callback_action=sendComment";
            $.ajax({
                url: BASE + "/src/Live.ajax.php",
                method: "post",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        $('.live_chat_controls #chat')[0].reset();
                        $(".caracteres").text(255);
                    }

                    if (data.comments) {
                        conn.send(JSON.stringify({"comments": data.comments}));
                        $('.j_comment').html(data.comments);
                    }
                }
            })
        }
    });

</script>