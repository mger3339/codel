$(document).ready(function() {
    $(".count_error").hide();
    $(document).on("blur",".count_control", function(){
        var id = $(this).attr('data-id');
        var count = $(this).val();
        var aaa = $(this);
        var total = $(".product_total").text();
        var total_count = parseInt(total.substring(7, total.length));
        $.ajax({
            url: '../editCartCount',
            type: "POST",
            data:{id: id, count: count},
            success: function(responce){
                if(responce == 1){
                    aaa.css({"border":"2px solid green"});
                    $(".count_error").hide();
                }
                else {
                    aaa.css({"border":"2px solid red"});
                    $(".count_error").show();
                    $(".count_error").text("max " + total_count);
                }
            }
        });
    });

});