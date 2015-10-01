$(document).ready(function () {
    $(".live_search").hide();
   $(".text_search").keyup(function(){
       $(".live_search").show();
       var text = $(this).val();
       text = text.trim();
       if(text == '')
       {
           $(".live_search").hide();
       }
       $.ajax({
           url: '/search/liveSearch',
           type: "POST",
           data: {text: text},
               success: function(result) {
                   result = JSON.parse(result);
                   $(".live_search ul").empty();
                       $.each(result, function(i,val){
                           $(".live_search ul").append('<li id="search'+ val['id']+'">' + val['name'] + '</li>');
                       });
               }
       });
   });
    $("body").on("click",'.live_search ul li', function(){
        var id = $(this).attr('id').replace('search', '');
        var changeUrl = $(".live_search").attr('change_url');
        $(".text_search").val($(this).text());
        $(".live_search").hide();
        window.location.href = changeUrl + '/' + id;
    })

});