$(document).ready(function () {
    $(".edit_button").on("click", function(){
        var id = $(this).attr('data-id');
        var area = $(this).text();
        $(".hidden_id").val(id);
        $("#country_edit_name").val(area);
        $.ajax({
            url: './getCoordinates',
            type: "POST",
            data: {id: id, area: area},
            success: function(result){
                var data = JSON.parse(result);
                $("#edit_latitude").val(data[0].latitude);
                $("#edit_longitude").val(data[0].longitude);
            }
        });
    });
});

$(document).ready(function () {
    $(".save_add_area").on("click", function(){
        var area = $.trim($('#country_name').val());
        if(area == '')
        {
            return false;
        }
        $.ajax({
            url: './checkArea',
            type: "POST",
            data: {area: area},
            success: function(result){
                if(result == 1)
                {
                    $(".country_name_error").show();
                    $("#country_name").css({"border": "1px solid #f00"});
                    $(".country_name_error").text('The city is already there, choose another');
                    return false;
                }
                else
                {
                    $("#country_name").css({"border": "1px solid green"});
                    $(".country_name_error").hide();
                }
            }
        });
    });
});
$(document).ready(function () {
    $(".save_edit_area").on("click", function(){
        var area = $.trim($('#country_edit_name').val());
        if(area == '')
        {
            return false;
        }
        $.ajax({
            url: './checkArea',
            type: "POST",
            data: {area: area},
            success: function(result){
                if(result == 1)
                {
                    $(".country_name_error").show();
                    $("#country_edit_name").css({"border": "1px solid #f00"});
                    $(".country_name_error").text('The city is already there, choose another');
                    return false;
                }
                else
                {
                    $("#country_edit_name").css({"border": "1px solid green"});
                    $(".country_name_error").hide();
                }
            }
        });
    });
});
