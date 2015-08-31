$(document).ready(function() {
    $(document).on("blur",".count_control", function(){
        var id = $(this).attr('data-id');
        var count = $(this).val();
        var aaa = $(this);
        $.ajax({
            url: './editCartCount',
            type: "POST",
            data:{id: id, count: count},
            success: function(responce){
                if(responce == 1){
                    aaa.css({"border":"1px solid green"});
                }
                else {
                    aaa.css({"border":"1px solid red"});
                }
            }
        });
    });

});