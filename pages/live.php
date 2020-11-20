<article class="event_play">

    <div class="event_play_embed">
        <div class="content">
            <div class="event_play_embed_video">
                <div class="event_play_bar">
                    <div class="bar_online radius icon-heart"><b class="j_online">00</b> online agora</div>
                </div>

                <div class="embed-container">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/<?= $getLive->video; ?>?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="event_play_embed_cta j_play_cta">
                    <a class="<?= $getLive->cta_icon ? $getLive->cta_icon : 'icon-fire' ?>"
                       target="_blank" href="<?= $getLive->offer ? $getLive->cta_link : "0" ?>"
                       title="<?= $getLive->cta_text ? $getLive->cta_text : LIVE_OFFER ?>"><?= $getLive->cta_text ? $getLive->cta_text : LIVE_OFFER ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="event_play_header">
        <header class="content">
            <h1><?= $getLive->title; ?></h1>
            <p><?= $getLive->description; ?></p>
        </header>
    </div>

    <aside class="event_play_commnets">
        <div class="content" id="comments">
            <header>
                <h1 class="title icon-bubbles2">Por favor, utilizem o chat com moderação e comentem sobre assuntos
                    pertinentes a live</h1>
            </header>

            <div class="container">

                <form id="chat">

                    <div class="message-box">
                        <input type="text" class="message-input contador" id="form-message" name="message"
                               maxlength="255" placeholder="Escreva seu comentário..."/>

                        <button type="submit" id="form-submit" class="message-submit icon-bullhorn">Comentar
                        </button>
                    </div>

                    <span class="caracteres">255</span>

                </form>

                <div id="display_comment"></div>

            </div>
            <div class="clear"></div>

        </div>
    </aside>

</article>

<div class="main_footer">
    <div class="content">
        <div class="footer_logo">
            <img width="145" src="<?= LIVE_BASE; ?>/images/logo_light.svg" alt="<?= SITE_NAME; ?>"
                 title="<?= SITE_NAME; ?>"/>
        </div>
    </div>
</div>

<script src="<?= LIVE_BASE; ?>/scripts/reconnecting-websocket.js"></script>
<script>

    var conn = new ReconnectingWebSocket('wss://websocketsuperchat.herokuapp.com/wss', null, {debug: false, reconnectInterval: 3000});
    
    var clientInformation = {
        author: $.cookie("userlogged"),
        hash: $.cookie("activemail")
    }

    function renderMessage(message) {
        var from;

        if (message.hash === clientInformation.hash) {
            from = "Eu";
        } else {
            from = message.author;
        }

        var today = new Date();
        messageTime = String(today.getDate()).padStart(2, '0') + '/' + String(today.getMonth() + 1).padStart(2, '0') + ' ' + String(today.getHours()) + ':' + String(today.getMinutes());

        $('#display_comment').prepend("<div class='panel panel-default'>" +
            "<span class='panel-time'>" + messageTime + "</span>" +
            "<div class='panel-heading'><b>" + from + ":</b><span class='panel-body'>" + message.message + "</span></div>" +
        "</div>");
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
                        $('#chat')[0].reset();
                        $(".caracteres").text(255);
                    }
                }
            })
        }
    });

</script>