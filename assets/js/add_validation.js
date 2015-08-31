$(document).ready(function(){
    $(".button_save").on("click",function(){
        var name = $.trim($("#exampleInputEmail1").val());
        var desc = $.trim($("#textarea").val());
        var price = $.trim($("#exampleInputPassword1").val());
        var total = $.trim($("#exampleInputTotal").val());
        var file = $("#exampleInputFile").val();
        window.result = true;
        if(name == ""){
            window.result = false;
            $("#exampleInputEmail1").css({"border":"1px solid #f00"});
            $(".name_error").text("Enter name");
        }
        else {
            $("#exampleInputEmail1").css({"border":"1px solid green"});
            $(".name_error").hide();
        }

        if(desc == ""){
            window.result = false;
            $("#textarea").css({"border":"1px solid #f00"});
            $(".desc_error").text("Enter description");
        }
        else {
            $("#textarea").css({"border":"1px solid green"});
            $(".desc_error").hide();
        }

        if(price == "" || $.isNumeric(price) == false) {
            window.result = false;
            $("#exampleInputPassword1").css({"border": "1px solid #f00"});
            $(".price_error").show();
            $(".price_error").text("Enter correct price");
        }
        else {
            $("#exampleInputPassword1").css({"border":"1px solid green"});
            $(".price_error").hide();
        }
        if(total == "" || $.isNumeric(total) == false) {
            window.result = false;
            $("#exampleInputTotal").css({"border": "1px solid #f00"});
            $(".total_error").show();
            $(".total_error").text("Enter correct total");
        }
        else {
            $("#exampleInputTotal").css({"border":"1px solid green"});
            $(".total_error").hide();
        }
        if(file == ""){
            window.result = false;
            $(".file").text("Empty File");
        }
        else {
            $(".file").hide();
            /*var file_format = file.split('.').pop();
             $.ajax({
             url: "/admin/form_validation/",
             type: "POST",
             async: false,
             data: {file_format: file_format},
             success: function(responsive){
             if(responsive == 1){
             window.result = false;
             $("#file_div").text("Wrong File format");
             }
             else{
             $("#file_div").hide();
             }
             }
             })*/
        }
        if(window.result == false){
            return false;
        }
    });
});


$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
});
