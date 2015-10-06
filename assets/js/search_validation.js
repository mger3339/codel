$('body').on('submit', '#serarchForm', function (e) {
    $(e.target).find('input').each(function (i, v) {
        var elm = $(v);
        if (elm.val() == '') {
            elm.attr('name', '');

        }
    });
});
$(document).ready(function () {
    var responce = $(".hidden_responce").val();
    if (responce == 1) {
        $(".warning").show();
        $(".warning").text('No search results');
    }
    else {
        $(".warning").hide();
    }
});
$('body').on('submit', '#serarchForm', function () {
    var text = $(".text_search").val();
    var from_price = $(".from_price").val();
    var do_price = $(".before_price").val();
    var area = $(".area_value").val();
    var category = $(".category_value").val();
    if (text == '' && from_price == '' && do_price == '' && area == null && category == null) {
        $(".warning").show();
        $(".warning").text('You do not selected');
        return false;
    }
});


