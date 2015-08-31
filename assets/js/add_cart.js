$(document).ready(function() {
    var add_count = 0;
    $(".asd").hide();
    $(document).on("click",".add_cart", function(){
        $(".asd").show();
        var a = $(".count").offset();
        $(".asd").offset({top: a.top, left: a.left});
        var id = $(this).attr('data-id');
        ++add_count;
        $(".asd").text(add_count);
        //var count = $(".asd").text();
        //alert(count);
        $.ajax({
            url: 'home/addToCart',
            type: "POST",
            data:{id: id},
            success: function(a){
                }
        });
        return false;
    });

});