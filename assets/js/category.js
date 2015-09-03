$(document).ready(function(){
    $(".add_category").hide();
    $(".edit_category").hide();
    $(".delete_category").hide();
    $(".add_category_button").on("click", function(){
        $(".edit_category").hide();
        $(".delete_category").hide();
        $(".add_category").show();
    });
    $(".edit_category_button").on("click", function(){
        $(".add_category").hide();
        $(".delete_category").hide();
        $(".edit_category").show();
    });
    $(".delete_category_button").on("click", function(){
        $(".add_category").hide();
        $(".edit_category").hide();
        $(".delete_category").show();
    });
});
$(document).ready(function(){
    $(".edit_category").show();
    $(".category_button").on("click", function(){
    $(".edit_category_name").show();
    })
})