$(document).ready(function(){
    var login = $("#admin_login").val();
    var password = $("#admin_password").val();
    if(login == '')
    {

    }




    $(".login_button").on("click", function(e){
        var changeUrl = $(e.target).attr('url-redirect');
        var login = $("#admin_login").val();
        var password = $("#admin_password").val();
        if(login == '' || password == '')
        {
            $(".alert_wrong").hide();
            $(".alert_empty").show();
            return false;
        }
        else
        {
            $(".alert_empty").hide();
        }
        var url = $("form").attr('data-url');
        $.ajax({
            url: url,
            type: "POST",
            data: {login:login, password: password},
            success: function (result) {
                if(result == 1)
                {
                    window.location.href = changeUrl;
                }
                else
                {
                    $(".alert_wrong").show();
                }
            }
        });
    });
});
