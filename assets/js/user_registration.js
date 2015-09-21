$(document).ready(function(){
    $(".reg_button").on("click",function(){
        var first_name = $.trim($("#first_name").val());
        var last_name = $.trim($("#last_name").val());
        var email = $.trim($("#email").val());
        var password = $.trim($("#password").val());
        var password_confirmation = $.trim($("#password_confirmation").val());
        window.result = true;
        window.a = false;
        if(first_name == ""){
            window.result = false;
            $("#first_name").css({"border":"1px solid #f00"});
            $(".first_name_error").text("Enter First name");
        }
        else {
            $("#first_name").css({"border":"1px solid green"});
            $(".first_name_error").hide();
        }

        if(last_name == ""){
            window.result = false;
            $("#last_name").css({"border":"1px solid #f00"});
            $(".last_name_error").text("Enter Last name");
        }
        else {
            $("#last_name").css({"border":"1px solid green"});
            $(".last_name_error").hide();
        }

        if(email != ''){
            var valid_email = $("#email");
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (filter.test(valid_email.val())) {
                $.ajax({
                    url: "/login/emailValidate",
                    type: "POST",
                    data:{email:email},
                    success: function(responce) {
                        if(responce == 1){
                            $("#email").css({"border": "1px solid green"});
                            $(".email_error").hide();
                        }
                        else {
                            window.a = false;
                            $("#email").css({"border": "1px solid #f00"});
                            $(".email_error").show();
                            $(".email_error").text("E-mail is already registered,enter  the other e-mail");
                        }
                    }
                });
            }
            else {
                window.result = false;
                $("#email").css({"border": "1px solid #f00"});
                $(".email_error").show();
                $(".email_error").text("Enter correct E-mail");
            }
        }
        else {
            window.result = false;
            $("#email").css({"border": "1px solid #f00"});
            $(".email_error").text("Enter E-mail");
        }
        if(password == "") {
            window.result = false;
            $("#password").css({"border": "1px solid #f00"});
            $(".password_error").text("Enter password");
        }
        else {
            $("#password").css({"border": "1px solid green"});
            $(".password_error").hide();
        }
        if(password_confirmation == "") {
            window.result = false;
            $("#password_confirmation").css({"border": "1px solid #f00"});
            $(".password_confirmation_error").text("Enter password confirmation");
        }
        else {
            $("#password_confirmation").css({"border":"1px solid green"});
            $(".password_confirmation_error").hide();
        }
        if(password != password_confirmation){
            window.result = false;
            $(".password_confirmation_error").show();
            $("#password_confirmation").css({"border": "1px solid #f00"});
            $(".password_confirmation_error").text("Password mismatch");
        }
        if(window.result == false){
            return false;
        }
        if(window.a == false){
            return false;
        }
    });
});

