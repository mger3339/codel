$(document).ready(function () {
    $(".loading_img").hide();
   $(".button_search").on("click", function(){
       var areas = $(".area_value").val();
       var category = $(".category_value").val();
       var from_price = $(".from_price").val();
       var to_price = $(".before_price").val();
       var text = $(".text_search").val();
       $.ajax({
           url: '/search/index',
           type: "GET",
           data: {
               areas: areas,
               category: category,
               from_price: from_price,
               before_price: to_price,
               text: text
           },
           beforeSend : function(){
               $(".loading_img").show();
           },
               success: function(data){
               $(".loading_img").hide();
               //    $.each( data, function(value ){
               //        data = value;
               //    });
               //    alert(data);
               //$(".main_div").each(function(index,element){
               //    $(".title").text(index);
               //});
               console.log(data);
           }
       });
   });
});