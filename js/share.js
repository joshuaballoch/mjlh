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
  newPopup($target.attr("href"));
});

function newPopup(url) {
  popupWindow = window.open(
    url,'popUpWindow','height=300,width=600,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
}
