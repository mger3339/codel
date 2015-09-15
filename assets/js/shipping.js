$(document).ready(function(){
    var total = $(".total_sum").text();
    var total_sum = parseInt(total.substring(5, total.length - 1));
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
        var count = [];
        var price = [];
        var total = $(".total_shipping_sum").text();
        var total_sum = parseInt(total.substring(7, total.length - 1));
        $( ".total_price" ).each(function( index) {
            var x = $( this ).text();
            window.y = parseInt(x.substring(3, x.length));
            price.push(window.y);
        });
        $(".count_control").each(function( index) {
            window.a = $( this ).val();
            count.push(window.a);
        });
        $.ajax({
            url: '/home/puyPage',
            type: "POST",
            data:{total: total_sum, price: price, count: count},
            success: function(a){
            }
        });
    });
});