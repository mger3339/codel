$('body').on('submit', '#serarchForm', function(e) {
    $(e.target).find('input').each(function(i, v){
        var elm = $(v);
        if(elm.val() == ''){
            elm.attr('name', '');
        }
    });
});
$(document).ready(function(){
    var responce = $(".hidden_responce").val();
    if(responce == 1)
    {
        $(".main_div").text('Not results');
    }
});


