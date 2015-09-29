$(document).ready(function () {
    $(".area_save").on("click", function(){
        window.result = true;
        var edit_area = $.trim($("#exampleInputEditArea").val());
        var add_area = $.trim($("#exampleInputAddArea").val());
        var latitude = $.trim($("#latitude").val());
        var longitude = $.trim($("#longitude").val());
        alert(latitude);
    })
});