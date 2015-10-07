$(document).ready(function () {
    var id = $(".hidden_id").val();

    $('#add_category').change(function () {
        $('.country_name_error').empty();
        submitCount = 0;
    });
    submitCount = 0;
    $('.add_category_form').on('submit', function (e) {
        if ($('.country_name_error').text()) {
            e.preventDefault();
        }
        else {
            if (!submitCount) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('data-check-url');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        submitCount++;
                        if (response.result) {
                            $("#add_category").css({"border": "1px solid #f00"});
                            $('.country_name_error').text('The city is already there, choose another');
                        }
                        else {
                            console.log(submitCount);
                            $('.country_name_error').empty();
                            $('.add_category_form').submit();
                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            } else {
                submitCount = 0;
                return true;
            }
        }
    });

    $('#edit_category').change(function () {
        $('.country_name_error').empty();
        submitCount = 0;
    });
    submitCount = 0;
    $('.edit_category_form').on('submit', function (e) {
        if ($('.country_name_error').text()) {
            e.preventDefault();
        }
        else {
            if (!submitCount) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('data-check-url');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        submitCount++;
                        if (response.result) {
                            $("#edit_category").css({"border": "1px solid #f00"});
                            $('.country_name_error').text('The city is already there, choose another');
                        }
                        else {
                            console.log(submitCount);
                            $('.country_name_error').empty();
                            $('.edit_category_form').submit();
                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            } else {
                submitCount = 0;
                return true;
            }
        }
    });

    $('.save_add_category').on('click', function () {
        var category = $.trim($("#add_category").val());
        window.result = true;
        if (category == '') {
            window.result = false;
            $("#add_category").css({"border": "1px solid #f00"});
            $('.country_name_error').text('Enter Category');
        }
        else {
            $("#add_category").css({"border": "1px solid green"});
        }
        if (window.result = false) {
            return false;
        }
    });

    $('.save_edit_category').on('click', function () {
        var category = $.trim($("#edit_category").val());
        if (category == '') {
            $("#edit_category").css({"border": "1px solid #f00"});
            return false;
        }
        else {
            $("#edit_category").css({"border": "1px solid green"});
        }
    });

});
