(function($) {
    var timeLimit = 10;
    var self;
    var baseUrl = baseURL + "/api/v1/";
    var init = {
        sendUrl: baseUrl + "message",
        destroyeUrl: baseUrl + "message",
        getUrl: baseUrl + "exist-message",
        showUrl: baseUrl + "message",
        sendquote: baseUrl + "send-quote",
    };
    $.fn.send = function() {
        self = $(this);
        var url = init.sendUrl;
        var message = $("textarea[name=message]").val();
        var subject = $("#subject").val();
        var toEmail = $("#toEmail").val();
        var ccEmail = $("#ccEmail").val();
        var duration = $("#duration").val();
        var password = $("#psw").val();
        var passwordHint = $("#psw_hint").val();
        var is_protected = 'no';
        var is_permanent = 'no';
        var user_id = $("#user_id").val();;
        if ($('#is_protected').is(':checked')) {
            is_protected = 'yes';
        }
        if ($('#is_permanent').is(':checked')) {
            is_permanent = 'yes';
        }
        var mobile_number = '1234567890'; //$('#mobile_number').val();
        var type = '1'; //$('#type').val();
        if (message.length <= 160) {
            $(".btn-loader").removeClass("hide");
            var ajaxObject = {
                "url": url,
                "method": "POST",
                "param": { "content": message, 'subject': subject,'to_email':toEmail,'cc_email':ccEmail,'duration': duration, user_id: user_id, 'password': password, 'password_hint': passwordHint, 'is_protected': is_protected, 'is_permanent': is_permanent, 'mobile_number': mobile_number, 'type': type },
                "callback": handleSendCallBack
            }
            ajaxCall(ajaxObject);
        } else {
            console.log('Need To Purchase Business Account.');
            // alert("Need To Purchase Business Account.")
        }
    };

    $.fn.sendquote = function() {
        self = $(this);
        var message = $("textarea[name=message]").val();
        var email_id = $("#email_id").val();
        $(".btn-loader").removeClass("hide");
        var ajaxObject = {
            "url": sendquote,
            "method": "POST",
            "param": { "message": message, 'email_id':email_id},
            "callback": handleSendCallBack
        }
        ajaxCall(ajaxObject);
    };


    $.fn.showMessage = function(token, password = '') {
        self = $(this);
        var messageToken = token;
        var newPAss = '';
        if (password.length > 0) {
            newPAss = '/' + password;
        }
        var url = init.showUrl + '/' + messageToken + newPAss;
        var ajaxObject = {
            "url": url,
            "method": "GET",
            "callback": handleSendCallBack
        };

        ajaxCall(ajaxObject);
    };


    $.fn.discardMessage = function() {
        var ajaxObject = {
            "url": destroyeUrl,
            "method": "delete",
        }
        ajaxCall(ajaxObject);
        $('.create-message').css('display', '');
        $("#create-message").trigger("reset");
        $('.hideDiv').css('display', 'none');
    };

    $.fn.getMessage = function(token, password = '') {
        self = $(this);
        var messageToken = token;
        var newPAss = '';
        if (password.length > 0) {
            newPAss = '/' + password;
        }
        var url = init.getUrl + '/' + messageToken + newPAss;
        var ajaxObject = {
            "url": url,
            "method": "GET",
            "callback": handleSendCallBack
        }
        ajaxCall(ajaxObject);
    };


    this.handleSendCallBack = function(response) {
        $(".btn-loader").addClass("hide");
        if (response.status == 200) {
            var generatedUrl = response.data.get_url;
            if (response.data.showUrl) {
                showUrl = response.data.showUrl;
                $('.show-message,.revel-message').css('display', 'none');
                $('#error-response-msg').text('').css('display', 'none');
                $('.final-message').css('display', '');
            } else {
                $('.hideDiv').css('display', '');
                $('.create-message,.revel-message').css('display', 'none');
                $('.show-message-box').text(generatedUrl);
                $('.final-message').css('display', 'none');

                if (typeof response.data.create_message !== 'undefined' && response.data.create_message.length > 0) {
                    var fmsg = response.data.message;
                } else {
                    var fmsg = response.data.message.replaceAll("<br />", ' googlelast ');
                    fmsg = fmsg.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
                    fmsg = fmsg.replaceAll(" googlelast ", "<br />");
                }
                $('.show-final-message-box').html(fmsg);
                $('#error-response-msg').text('').css('display', 'none');
                $('.show-message').css('display', '');
                $(".share-in-email").attr("rel", generatedUrl);
                if (response.data.remove_url) {
                    destroyeUrl = response.data.remove_url;
                }
                if(response.data.subject) {
                    if (response.data.subject.length > 0) {
                        $('.subject').text(response.data.subject);
                    }
                }
                if (response.data.duration) {
                    if (response.data.recreate) {
                        $('#durationVal').val('');
                        $('#timerData,#clock').remove();
                        $('#copyButton').attr("href",'/').text('Compose Message');
                    }
                    timeLimit = response.data.duration
                    var redirectUrl = $('#frontUrl').val();
                    if (timeLimit) {
                        CountDown($('#durationVal').val(),$('#timerData'));
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, timeLimit * 1000);

                    }
                }
            }
        } else {
            $('#error-response-msg').text(response.message).css('display', '');

            /*$('#msg_info').css('display', 'none');
            $('#psw').css('display', 'none');
            $('#show-msg-btn').css('display', 'none');*/

            $('#msg_img_lock').css('display', 'none');
            $('#msg_img_message_null').css('display', 'none');
            $('#msg_img_data_not_exist').css('display', 'none');

            $('#msg_info').css('display', 'none');
            $('#password-protect-msg').css('display', 'none');
            $('#psw').css('display', 'none');
            $('#show-msg-btn').css('display', 'none');

            if (response.message_type == 'message_null') {
                $('#msg_img_message_null').css('display', 'inline-block');
                $('.final-message').css('display', 'none');
            } else if (response.message_type == 'data_not_exist') {
                $('#msg_img_data_not_exist').css('display', 'inline-block');
                $('.final-message').css('display', 'none');
            } else {
                $('#msg_img_lock').css('display', 'inline-block');

                $('#msg_info').css('display', 'block');
                $('#password-protect-msg').css('display', 'inline-block');
                $('#psw').css('display', 'inline-block');
                $('#show-msg-btn').css('display', 'inline-block');
                if (response.message_type == 'lock_protected') {
                    $('#error-response-msg').text('').css('display', 'none');
                }
            }
            $('.revel-message').css('display', 'inline-block');
        }
    }
    $.fn.receive = function(data) {
        self = $(this);
        if (data.message != "") {
            $(".reveal-textarea").val(data.message);
            $(document).delegate(".reveal-btn button", "click", function() {
                $(".reveal").removeClass("hide");
                $(".reveal-btn").addClass("hide");

                var ajaxObject = {
                    "url": data.base_url + init.destroyeUrl + "/" + data.slug,
                    "method": "DELETE"
                }
                ajaxCall(ajaxObject);

                var timeOut = isSet(data.timeout) && data.timeout != "" ? data.timeout : 15;
                CountDown($('#durationVal').val(),$('#timerData'));
                if (timeOut != 0) {
                    setTimeout(function() {
                        window.location.href = data.base_url;
                    }, timeOut * 1000);
                }
            });

            $(document).delegate(".back-btn", "click", function() {
                window.location.href = data.base_url;
            });
        }

    };
    this.ajaxCall = function(ajaxObject) {
        if (typeof ajaxObject == "object") {
            var url = ajaxObject.url;
            var param = ajaxObject.param;
            var callback = ajaxObject.callback;
            var method = isSet(ajaxObject.method) ? ajaxObject.method : "GET";
            $.ajax({
                url: url,
                data: param,
                method: method,
                success: function(result) {
                    if (isSet(callback)) {
                        callback.call(this, result);
                    }
                },
                error: function(result) {
                    alert(result.responseJSON.message);
                }
            });
        } else {
            console.log("Break from the ajaxCall method.");
        }
    }
    this.isSet = function(value) {
        if (value == undefined || value == null) {
            return false;
        }
        return true;
    }
    this.handleShareMessage = function(url) {

        var smsUrl = "sms:?&body=" + url;
        var whatsappUrl = "whatsapp://send?text=" + url;
        var emailUrl = "mailto:?body=" + url;

        self.find(".share-in-message").attr("href", smsUrl);
        self.find(".share-in-whatsapp").attr("href", whatsappUrl);
        self.find(".share-in-email").attr("href", emailUrl);

        $(document).delegate(".share-btn, .share-links a", "click", function() {
            $(".btn-box").toggleClass("open");
        });
        $(document).delegate(".copy-btn", "click", function() {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(this).siblings("p").text()).select();
            document.execCommand("copy");
            $temp.remove();
        });
    }
})(jQuery);
$(document).ajaxStart(function(){
    // Show image container
    $("#loader-bg").show();
});
$(document).ajaxComplete(function(){
    // Hide image container
    $("#loader-bg").hide();
});
$(document).ready(function() {
$(".nav .nav-link").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).addClass("active");
});

$(".navbar-toggler").click(function(){
  $("body").toggleClass("stop-scroll");
});

$(".mobile-close-button").click( function () {
   $(".navbar-toggler").trigger('click');
});

});

function CountDown(duration, display) {
    if (!isNaN(duration)) {
        var timer = duration, minutes, seconds;

        var interVal=  setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
            if (--timer < 0) {
                timer = duration;
                // SubmitFunction();
                $('#timerData').empty();
                clearInterval(interVal)
            }
        },1000);
    }
}


// function SubmitFunction(){
//     $('#timerData').html('refresh');
// }
