$(document).ready(function() {
    var sum = 0;
    $( ".total_price" ).each(function( index) {
        var x = $( this ).text();
        var y = parseInt(x.substring(3, x.length));
        sum = sum + y;
    });
    $(".total_sum").text("SUM: " + sum + "$");
    $(document).on("blur",".count_control", function(){
        var id = $(this).attr('data-id');
        var count = $(this).val();
        var this_input = $(this);
        var total = $("#price_" +id).text();
        var total_price = parseInt(total.substring(7, total.length));
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
                    $("#total" +id).text(" = " + (total_price * count) +"$");
                    var sum = 0;
                    $( ".total_price" ).each(function( index) {
                        var x = $( this ).text();
                        var y = parseInt(x.substring(3, x.length));
                        sum = sum + y;
                    });
                    $(".total_sum").text("SUM: " + sum + "$");
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