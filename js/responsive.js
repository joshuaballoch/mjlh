$(document).ready(function(){
  // Change header h1 size as page resizes..
  checkWindowSize();
  $(window).resize(function () {
    checkWindowSize();
  });


});

var checkWindowSize = function(){
  var viewPortWidth = $(window).width();
  var triggerWidth = 768;
  if (viewPortWidth < 768) {
    resizeHeaderH1Size(viewPortWidth, triggerWidth);
    resizeHeaderLogo(viewPortWidth,triggerWidth);
    resizeHeaderHeight(viewPortWidth,triggerWidth);
    move_locale_link_to_side();
  } else {
    move_locale_link_to_top();
  }
};

var responsiveResizeScalar = function(viewPortWidth, triggerWidth) {
  var minWidth = 400;
  var scalar = 1-((triggerWidth-viewPortWidth)/(triggerWidth-400));
  return scalar;
};
var responsiveScaleThis = function(startSize,minSize,viewPortWidth,triggerWidth) {
  var ret = responsiveResizeScalar(viewPortWidth,triggerWidth)*(startSize-minSize)+minSize;
  return ret;
};
var resizeHeaderH1Size = function(viewPortWidth, triggerWidth){
  var startFontSize = parseInt($('header h1').not(".small").css('font-size').slice(0,-2));
  var minFontSize = 14;
  var newFontSize = responsiveScaleThis(startFontSize,minFontSize,viewPortWidth,triggerWidth);
  $('header h1.small').css("font-size",newFontSize);
};
var resizeHeaderLogo = function(viewPortWidth,triggerWidth) {
  var startSize = $('header h1').not('.small').find('.mjlh-logo').height();
  var minSize = 20;
  var newLogoSize = responsiveScaleThis(startSize,minSize,viewPortWidth,triggerWidth);
  var $logo = $('header h1.small .mjlh-logo');
  $logo.css("height",newLogoSize+"px");
  $logo.css("width",newLogoSize+"px");
}

var resizeHeaderHeight = function(viewPortWidth,triggerWidth) {
  var $header = $('header');
  var startHeight = 125;
  var minHeight = 59;
  var startPadding = 56;
  var minPadding = 4;

  var newHeight = responsiveScaleThis(startHeight,minHeight,viewPortWidth,triggerWidth);
  var newPadding = responsiveScaleThis(startPadding,minPadding,viewPortWidth,triggerWidth);

  $header.css("height",newHeight);
  $header.css("padding-top",newPadding)
}

var move_locale_link_to_top = function () {
  $('.locale-link').removeClass('side');
};

var move_locale_link_to_side = function () {
  $('.locale-link').addClass('side');
};

