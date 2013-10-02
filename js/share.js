// $(document).ready(function(){
//   $(document).on("click",".js-share",function(event){
//     event.preventDefault();
//     console.log(event);
//   });
// });
$(document).on("click",".js-share",function(event){
  event.preventDefault();
  var $target = $(event.currentTarget);
  console.log($target.attr("href"));
  window.open($target.attr("href"));
});
