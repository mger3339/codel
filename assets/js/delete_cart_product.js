$(document).ready(function(){
    $(document).on("click", '.delete',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url: "./deleteCartProduct",
            type: "POST",
            data:{id: id},
            success: function(result){
                if(result == 1){
                    $(".cart_1"+id+"").remove();
                }
            }
        });
    });
});

$(document).ready(function(){
    $(document).on("click", '.delete_all_in_cart',function(){
        var user_id = $(".user_id_hidden").val();
        if($('#select_all')[0].checked == true)
        {
            $.ajax({
                url: "./deleteAllCartProduct",
                type: "POST",
                data:{user_id: user_id},
                success: function()
                {
                    $(".cart_products").remove();
                }
            });
        }
        else
        {
            $(".select_error").show();
            $(".select_error").text('Please select minimum 1 product');
            return false;
        }
    });
});
