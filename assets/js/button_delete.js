$(document).ready(function () {
    $(document).on("click", '.delete', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/admin/products/deleteProduct",
            type: "POST",
            data: {id: id},
            success: function (result) {
                if (result == 1) {
                    $('.info').show();
                    $(".product_" + id + "").remove();
                }
            }
        });
    });
});