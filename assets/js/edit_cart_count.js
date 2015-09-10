$(document).ready(function() {
    $(document).on("blur",".count_control", function(){
        var id = $(this).attr('data-id');
        var count = $(this).val();
        var aaa = $(this);
        var total = $(".total_price").text();
        var total_count = parseInt(total.substring(13, total.length));
        alert(total_count);
        $.ajax({
            url: './editCartCount',
            type: "POST",
            data:{id: id, count: count},
            success: function(responce){
                if(responce == 1){
                    aaa.css({"border":"2px solid green"});
                }
                else {
                    aaa.css({"border":"2px solid red"});
                }
            }
        });
    });

});