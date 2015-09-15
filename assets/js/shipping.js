$(document).ready(function(){
    var total = $(".total_sum").text();
    var total_sum = parseInt(total.substring(5, total.length - 1));
    $(".total_shipping_sum").text("TOTAL: " + total_sum + "$");
    $(".shipping_price_button").on("click", function(){
        var price = $(this).text();
        var id = $(this).attr('data-id');
        var price_shipping = parseInt(price.substring(0, price.length - 1));
        var total = $(".total_sum").text();
        var total_sum = parseInt(total.substring(5, total.length - 1));
        $(".shipping").text("SHIPPING: " + price);
        $(".total_shipping_sum").text("TOTAL: " + (price_shipping + total_sum) + "$");
    });
});

$(document).ready(function(){
    $(".buy_now").on("click", function(){
        var a = $(".product_price").text();
        var total = parseInt(a.substring(7, a.length - 1));
        var id = $("button").attr('data-id');
        var count = $(".count_control").val();
        $.ajax({
            url: '../puyPage',
            type: "POST",
            data:{total: total, id: id, count: count},
            success: function(data){
            }
        });
    });
});