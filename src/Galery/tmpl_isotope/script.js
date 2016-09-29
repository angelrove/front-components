
// Imicializar -------------------
function isotope_load() {
  // init Isotope after all images have loaded
  $grid = $(".grid").imagesLoaded( function() {
     $grid.isotope({
        itemSelector: ".grid-item",

        layoutMode : "masonry",
        // layoutMode : "fitRows",

        percentPosition: true
       });
  });

  return $grid;
}
//--------------------------------

$(document).ready(function() {

   // Init --------------------------
   var $grid = isotope_load();

   // Title -------------------------
   $(".grid-item .thumb").mouseover(function() {
      $("#"+this.id+" .thumb_overlay-show_over").fadeIn(320);
   });
   $(".grid-item .thumb").mouseleave(function() {
      $("#"+this.id+" .thumb_overlay-show_over").fadeOut(210);
   });

});
