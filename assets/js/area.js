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
    submitCount = 0;
    $('.add_area_form').on('submit',function(e){
        if(!submitCount){
            e.preventDefault();
            console.log(submitCount);

            var data = $(this).serialize();
            $.ajax({
                url: './checkArea',
                type: "POST",
                data: data,
                dataType:'json',
                success: function (response) {
                    submitCount ++;
                    if(response.result){
                        $("#country_name").css({"border": "1px solid #f00"});
                        $('.country_name_error').text('The city is already there, choose another');
                    }
                    else{
                        $('.add_area_form').submit();
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }else{
            submitCount = 0;
            return true;
        }
    });
});

$(document).ready(function () {
    submitCount = 0;
    $('.edit_area_form').on('submit',function(e){
        if(!submitCount){
            e.preventDefault();
            console.log(submitCount);

            var data = $(this).serialize();
            $.ajax({
                url: './checkArea',
                type: "POST",
                data: data,
                dataType:'json',
                success: function (response) {
                    submitCount ++;
                    if(response.result){
                        $(".country_name_error").show();
                        $("#country_edit_name").css({"border": "1px solid #f00"});
                        $('.country_name_error').text('The city is already there, choose another');
                    }
                    else{
                        $(".country_name_error").hide();
                        $('.edit_area_form').submit();

                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }else{
            submitCount = 0;
            return true;
        }
    });
});