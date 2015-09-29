$(document).ready(function () {
    $(".edit_button").on("click", function(){
        var id = $(this).attr('data-id');
        var area = $(this).text();
        $(".hidden_id").val(id);
        $("#country_name").val(area);
        $.ajax({
            url: './getCoordinates',
            type: "POST",
            data: {id: id, area: area},
            success: function(result){
                var data = JSON.parse(result);
                $("#edit_latitude").val(data[0].latitude);
                $("#edit_longitude").val(data[0].longitude);
            }
        });
    });
});

$(document).ready(function () {
    $(".delete_button").on("click", function(){
        var this_button = $(this);
        var id = $(this).attr('data-id');
        var area = $(this).text();
        alert(area);
        $(".hidden_delete_id").val(id);
        $.ajax({
            url: './getCoordinates',
            type: "POST",
            data: {id: id},
            success: function(result){
                var data = JSON.parse(result);
                $("#edit_latitude").val(data[0].latitude);
                $("#edit_longitude").val(data[0].longitude);

            }
        });
    });
});