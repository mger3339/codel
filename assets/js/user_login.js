$(document).ready(function(){
    $(".button_login").on("click",function(){
        var email = $.trim($("#login").val());
        var password = $.trim($("#password_login").val());
        window.result = true;
        if(email != ''){
            var valid_email = $("#login");
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (filter.test(valid_email.val())) {
                $("#login").css({"border": "1px solid green"});
            }
            else {
                window.result = false;
                $("#login").val('Example@gmail.com');
                $("#login").css({"border": "1px solid #f00"});
            }
        }
        else {
            window.result = false;
            $("#login").css({"border": "1px solid #f00"});
        }
        if(password == "") {
            window.result = false;
            $("#password_login").css({"border": "1px solid #f00"});
        }
        else {
            $("#password_login").css({"border": "1px solid green"});
        }
        if(window.result == false){
            return false;
        }
        if(window.a == false){
            return false;
        }
    });
});

