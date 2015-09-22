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
