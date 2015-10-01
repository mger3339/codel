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
    $(".select_error").hide();
    $(".buy_now").on("click", function(){
        var changeUrl = $(this).attr('change_url');
        var id = [];
        var count = {};
        var price = {};
        var a =  $( "input:checked").val();
        if(!a){
            $(".select_error").show();
            $(".select_error").text('Please select minimum 1 product');
            return false;
        }
        var shipp = $(".shipping").text();
        var shipping = parseInt(shipp.substring(10, shipp.length - 1));
        var total = $(".total_shipping_sum").text();
        var total_sum = parseInt(total.substring(7, total.length - 1));
        $( "input:checked").each(function(i,v) {
            var ids = $(v).val();
            id.push(ids);
        });
        $( ".total_price" ).each(function(i, v) {
            var x = $(v).text();
            x = parseInt(x.substring(3, x.length));
            price[$(v).attr('id').replace('total', '')] = x;
        });
        $(".count_control").each(function(i, v) {
            count[$(v).attr('data-id')] = parseInt($(v).val());
        });
        $.ajax({
            url: './puyPage',
            type: "POST",
            data:{total: total_sum, price: price, count: count,id: id, shipping:shipping },
            success: function(data){
                console.log(data);
                window.location.href = changeUrl;
            },
            error: function (data) {
            }
        });
    });
});

$(document).ready(function(){
    $('#select_all').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        }
        else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
});
