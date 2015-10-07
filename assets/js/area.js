$(document).ready(function () {
    var id = $(".hidden_id").val();
    submitCount = 0;
    $('.add_area_form').on('submit',function(e){
        if(!submitCount){
            e.preventDefault();
            console.log(submitCount);
            var url = $(this).attr('data-check-url');
            var data = $(this).serialize();
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType:'json',
                success: function (response) {
                    console.log(response);
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
        } else {
            submitCount = 0;
            return true;
        }
    });

    $('.edit_area_form').on('submit',function(e){
        //debugger;
        if(!submitCount || $(".country_name_error").text()){
            //debugger;
            e.preventDefault();

            var data = $(this).serialize();
            $.ajax({
                url: $(e.target).attr('data-validate'),
                type: "POST",
                data: data,
                dataType:'json',
                success: function (response) {
                    submitCount ++;
                    if(response.result){
                        //debugger;
                        $("#country_edit_name").css({"border": "1px solid #f00"});
                        $(".country_name_error").show().text('The city is already there, choose another');
                    }
                    else{
                        //debugger;
                        $(".country_name_error").empty();
                        $('.edit_area_form').submit();
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
        else{
            //debugger;
            submitCount = 0;
            if($(".country_name_error").text()){
                //debugger;
                return false;
            }
            return true;
        }
    });
});