$(document).ready(function () {
    $(".edit_button").on("click", function(){
        var id = $(this).attr('data-id');
        var area = $(this).text();
        $(".hidden_id").val(id);
        $("#edit_category").val(area);
    });
});

$(document).ready(function () {

    $('#add_category').change(function(){
        $('.country_name_error').empty();
        submitCount = 0;
    });
    submitCount = 0;
    $('.add_category_form').on('submit',function(e){
        if($('.country_name_error').text()){
            e.preventDefault();
        }
        else{
            if(!submitCount){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: './checkCategory',
                    type: "POST",
                    data: data,
                    dataType:'json',
                    success: function (response) {
                        submitCount ++;
                        if(response.result){
                            $("#add_category").css({"border": "1px solid #f00"});
                            $('.country_name_error').text('The city is already there, choose another');
                        }
                        else{
                            console.log(submitCount);
                            $('.country_name_error').empty();
                            $('.add_category_form').submit();
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
        }
    });
});
$(document).ready(function () {

    $('#edit_category').change(function(){
        $('.country_name_error').empty();
        submitCount = 0;
    });
    submitCount = 0;
    $('.edit_category_form').on('submit',function(e){
        if($('.country_name_error').text()){
            e.preventDefault();
        }
        else{
            if(!submitCount){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: './checkCategory',
                    type: "POST",
                    data: data,
                    dataType:'json',
                    success: function (response) {
                        submitCount ++;
                        if(response.result){
                            $("#edit_category").css({"border": "1px solid #f00"});
                            $('.country_name_error').text('The city is already there, choose another');
                        }
                        else{
                            console.log(submitCount);
                            $('.country_name_error').empty();
                            $('.edit_category_form').submit();
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
        }
    });
});

$(document).ready(function(){
   $('.save_add_category').on('click', function(){
       var category = $.trim($("#add_category").val());
       window.result = true;
       if(category == '')
       {
           window.result = false;
           $("#add_category").css({"border": "1px solid #f00"});
           $('.country_name_error').text('Enter Category');
       }
       else
       {
           $("#add_category").css({"border": "1px solid green"});
       }
       if(window.result = false)
       {
           return false;
       }
   });

});
$(document).ready(function(){
    $('.save_edit_category').on('click', function(){
        var category = $.trim($("#edit_category").val());
        if(category == '')
        {
            $("#edit_category").css({"border": "1px solid #f00"});
            return false;
        }
        else
        {
            $("#edit_category").css({"border": "1px solid green"});
        }
    });

});
