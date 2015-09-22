$(document).ready(function () {
    $(document).on("click", '.delete', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/admin/products/deleteProduct",
            type: "POST",
            data: {id: id},
            success: function (result) {
                if (result == 1) {
                    $('.info').text('Product deleted');
                    $(".product_" + id + "").remove();
                }
            }
        });
    });
});