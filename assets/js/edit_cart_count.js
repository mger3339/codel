$(document).ready(function() {
    $(document).on("blur",".count_control", function(){
        var id = $(this).attr('data-id');
        var count = $(this).val();
        var this_input = $(this);
        var total = $("#price_" +id).text();
        var total_price = parseInt(total.substring(7, total.length));
        $("#total" +id).text(" = " + (total_price * count) +"$");
        var price = $("#total" +id).text();
        var all_price = parseInt(price.substring(3, price.length));
        $.ajax({
            url: './editCartCount',
            type: "POST",
            data:{id: id, count: count},
            success: function(result) {
                var data = jQuery.parseJSON(result);
                if (data.responce == 1) {
                    this_input.css({"border": "2px solid green"});
                }
                else {
                    this_input.css({"border": "2px solid red"});
                    $("#total" +id).text(" = " + total_price * data.result + "$");
                    this_input.val(data.result);
                }
            }
        });
    });
});