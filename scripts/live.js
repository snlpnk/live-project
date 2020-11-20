$(function () {
    var BASE = $('link[rel="base"]').attr('href');

    $(document).on("input keypress", ".contador", function () {
        var limite = 255;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        $(".caracteres").text(caracteresRestantes);
    });

    //ERROR CLOSE
    $('.j_error_close').click(function () {
        $('.ajax_error').fadeOut(200, function () {
            $('.ajax_error_modal').removeClass('error success');
        });
    });

    //EXECUTION TIME
    if ($('.event_play_embed').length) {
        EventLoads();

        setInterval(function () {
            EventLoads();
        }, 60 * 1000);
    }

    //OFFER
    function EventLoads() {
        $.post(BASE + "src/Live.ajax.php", {callback_action: 'liveLoads'}, function (data) {

            if (data.offer !== $('.j_play_cta a').attr('href')) {
                $('.j_play_cta').fadeOut(400, function () {
                    $('.j_play_cta a').attr('href', data.offer);
                });
            }

            if (data.success === true) {
                $('.j_play_cta').fadeIn("slow");
            } else {
                $('.j_play_cta').fadeOut('slow');
            }

            if (data.online) {
                waitForSocketConnection(conn, function() {
                    conn.send(JSON.stringify({"online": data.online}));   
                }); 
                $('.j_online').html(data.online);
            }

            if (data.output) {
                $('#display_comment').html(data.output);
            }
            
            if(data.output === "") {
                $('#display_comment').html("");
            }

        }, 'json');
    }
    
    function waitForSocketConnection(socket, callback){
        setTimeout(
            function(){
                if (socket.readyState === 1) {
                    if(callback !== undefined){
                        callback();
                    }
                } else {
                    waitForSocketConnection(socket,callback);
                }
            }, 5);
    }

    //FORM BD
    $('.ajax_form').submit(function () {

        var Form = $(this);
        Form.find('.ajax_load').fadeIn().css('display', 'flex');

        $.post(BASE + "src/Live.ajax.php", $(this).serialize(), function (data) {
            Form.find('.ajax_load').fadeOut(200);

            if (data.trigger) {
                $('.ajax_error_modal').addClass(data.trigger[0]);
                $('.ajax_error_modal_content').html(data.trigger[1]);
                $('.ajax_error').fadeIn().css('display', 'flex');
            }

            if (data.reload) {
                window.location.reload();
            }

            if (data.redirect) {
                window.setTimeout(function () {
                    window.location.href = data.redirect;
                }, 1500);
            }

        }, 'json');
        return false;
    });
});