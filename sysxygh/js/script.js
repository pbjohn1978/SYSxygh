$(document).ready(function(){
   $("#navMenu ul li").hover( function() {
       $(this).find("ul").stop().slideToggle(400);
   })
});