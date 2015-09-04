$(document).ready(function(){
    $(".shipping_div").hide();
    $(".buy_button").on("click", function(){
        $(".shipping_div").fadeIn(400);
        $(".buy_button").on("blur", function(){
            $(".shipping_div").fadeOut(400);
        });
    });
});

$(document).ready(function(){
    var price_product = $(".product_price").text();
    price_product = parseInt(price_product.substring(7, price_product.length - 1));
    $(".shipping_price_button").on("click", function(){
        var price = $(this).text();
        var id = $(this).attr('data-id');
        var price_shipping = parseInt(price.substring(0, price.length - 1));
        var total_shipping = price_product + price_shipping;
        $(".product_price").text("PRICE: " + price_product + "$ + " + price_shipping + "$ = " + total_shipping + "$");
    });
});
