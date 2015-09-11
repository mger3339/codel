$(document).ready(function() {
    var id_p = $(".max_count input").attr('data-id');
    var total = $("#total"+id_p).text();
    var total_price = parseInt(total.substring(13, total.length));
    $(document).on("blur",".count_control", function(){
        var id = $(this).attr('data-id');
        var count = $(this).val();
        var aaa = $(this);
        $.ajax({
            url: './editCartCount',
            type: "POST",
            data:{id: id, count: count},
            success: function(responce){
                alert(total);
                var resp = parseInt(responce.substring(0,responce.length-2));
                var result = parseInt(responce.substring(1,responce.length));
                if(resp == 1){
                    aaa.css({"border":"2px solid green"});
                }
                else {
                    aaa.css({"border":"2px solid red"});
                    if(count < 0)
                    {
                        $("#total"+id_p).text("TOTAL PRICE: " + (total_price * 1) + " $");
                        aaa.val("1");
                        aaa.css({"border":"2px solid red"});
                        aaa.css({"border":"2px solid green"});
                    }
                    if(count > 0 && count <= result)
                    {
                        $("#total"+id_p).text("TOTAL PRICE: " + (total_price * count) + " $");
                    }
                    if(count > result)
                    {
                        $("#total"+id_p).text("TOTAL PRICE: " + (total_price * result) + " $");
                        aaa.val(result);
                        aaa.css({"border":"2px solid red"});
                        aaa.css({"border":"2px solid green"});
                    }
                }
            }
        });
    });

});