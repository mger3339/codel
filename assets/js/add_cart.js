$(document).ready(function() {
    var add_count = $(".count").text();
    $(".asd").hide();
    $(document).on("click",".add_cart", function(){
        $(".asd").show();
        var a = $(".count").offset();
        $(".asd").offset({top: a.top, left: a.left});
        var id = $(this).attr('data-id');
        ++add_count;
        $(".count").text(add_count);
        $.ajax({
            url: '/home/addToCart',
            type: "POST",
            data:{id: id},
            success: function(){
                }
        });
        return false;
    });

});
