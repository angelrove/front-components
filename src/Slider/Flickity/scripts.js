var $carousel = $("#main_slider .carousel").flickity({
  pauseAutoPlayOnHover: false,
  autoPlay: false,
  pageDots: false,
  wrapAround: true,
  lazyLoad: true,
  setGallerySize: true,
  adaptiveHeight: false
});

var $caption_title = $("#main_slider .caption-title");
var $caption_descr = $("#main_slider .caption-description");

/*
$(document).ready( function() {
  //-------------------------
  $carousel.on("select.flickity", function() {
    $caption_title.animateCss("fadeInUp");
    $caption_descr.animateCss("fadeInUp");
  });
});
*/