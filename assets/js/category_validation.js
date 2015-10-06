$(document).ready(function () {
    $(".save_add_area").on("click", function () {
        window.result = true;
        var add_area = $.trim($("#country_name").val());
        var latitude = $.trim($("#latitude").val());
        var longitude = $.trim($("#longitude").val());
        if (add_area == "") {
            window.result = false;
            $("#country_name").css({"border": "1px solid #f00"});
            $(".country_name_error").text("Enter country name");
        }
        else {
            $("#country_name").css({"border": "1px solid green"});
            $(".country_name_error").hide();
        }

        if (latitude == "" || $.isNumeric(latitude) == false) {
            window.result = false;
            $("#latitude").css({"border": "1px solid #f00"});
            $(".latitude_error").show();
            $(".latitude_error").text("Enter correct latitude");
        }
        else {
            $("#latitude").css({"border": "1px solid green"});
            $(".latitude_error").hide();
        }

        if (longitude == "" || $.isNumeric(longitude) == false) {
            window.result = false;
            $("#longitude").css({"border": "1px solid #f00"});
            $(".longitude_error").show();
            $(".longitude_error").text("Enter correct longitude");
        }
        else {
            $("#longitude").css({"border": "1px solid green"});
            $(".longitude_error").hide();
        }

        if (window.result == false) {
            return false;
        }
    });

    $(".save_edit_area").on("click", function () {
        window.result = true;
        var edit_area = $.trim($("#country_edit_name").val());
        var edit_latitude = $.trim($("#edit_latitude").val());
        var edit_longitude = $.trim($("#edit_longitude").val());
        if (edit_area == "") {
            window.result = false;
            $("#country_edit_name").css({"border": "1px solid #f00"});
            $(".country_name_error").text("Enter country name");
        }
        else {
            $("#country_edit_name").css({"border": "1px solid green"});
            $(".country_name_error").hide();
        }

        if (edit_latitude == "" || $.isNumeric(edit_latitude) == false) {
            window.result = false;
            $("#edit_latitude").css({"border": "1px solid #f00"});
            $(".latitude_error").show();
            $(".latitude_error").text("Enter correct latitude");
        }
        else {
            $("#edit_latitude").css({"border": "1px solid green"});
            $(".latitude_error").hide();
        }

        if (edit_longitude == "" || $.isNumeric(edit_longitude) == false) {
            window.result = false;
            $("#edit_longitude").css({"border": "1px solid #f00"});
            $(".longitude_error").show();
            $(".longitude_error").text("Enter correct longitude");
        }
        else {
            $("#edit_longitude").css({"border": "1px solid green"});
            $(".longitude_error").hide();
        }

        if (window.result == false) {
            return false;
        }
    });
});