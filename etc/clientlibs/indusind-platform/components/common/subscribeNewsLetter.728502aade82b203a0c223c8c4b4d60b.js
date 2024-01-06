var gcaptcahsumbit = '';
$(document).ready(function() {
    var siteKey = $(".recaptchadiv").attr("data-sitekey");
    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {
            action: 'homepage'
        }).then(function(token) {
            gcaptcahsumbit = token;
        });
    });
    var email = "";
    $(".successmessagep").hide();
    $(".recaptchaerror").hide();
    $(".subscribenewsletter").click(function() {
        $(".successmessagep").hide();
        $(".recaptchaerror").hide();
        email = $("input[name=emailinput]").val();
        email = validateEmail(email);

        if (typeof email == "undefined" || email === "") {
            $(".errormessagep").show();
            //$(".recaptchadiv").hide();
        } else {
            $(".errormessagep").hide();
            //$(".recaptchadiv").show();
        }
    });
    $(".subscribenewsletter").click(function() {
        $.ajax({
            url: "/bin/subscribeToNewsLetter",
            type: "post",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({
                email: email,
                recaptchaResponse: gcaptcahsumbit
            }),
            success: function success(response) {
                var responsefromservlet = JSON.parse(response);

                if (responsefromservlet.success === "true") {
                    $(".successmessagep").html($(".successmessagep").attr("data-attr-successmessage"));
                    $(".successmessagep").show();
                    //$(".recaptchadiv").hide();
                } else {
                    $(".successmessagep").html(responsefromservlet.message);
                    $(".successmessagep").show();
                    //$(".recaptchadiv").hide();
                }
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });
});

function validateEmail(email) {
    var remail = /^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$/;

    if (remail.test(email)) {
        return email;
    } else {
        return "";
    }
}