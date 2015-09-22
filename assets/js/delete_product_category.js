$(document).ready(function () {
    $(document).on("click", '.delete_category', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/admin/categories/deleteProduct",
            type: "POST",
            data: {id: id},
            success: function (id) {
                alert(id);
                if (result == 1) {
                    alert(result);
                    $('.info').text('Product deleted');
                    $(".product_" + id + "").remove();
                    window.location.replace("http://shop.dev/index.php/admin/categories/productViewByCategory/" + id + "");
                }
            }
        });
    });
});