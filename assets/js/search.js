$(document).ready(function () {
    $(".live_search").hide();
   $(".text_search").keyup(function(){
       $(".live_search").show();
       var text = $(this).val();
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
        $(".text_search").val($(this).text());
    })

});