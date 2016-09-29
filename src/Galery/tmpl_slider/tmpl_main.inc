<?
use angelrove\utils\UtilsBasic;
?>

<div id="galery_<?=$this->id_galery?>" class="Galery_slider">
   <div class="carousel carousel-main"
        data-flickity='{ "wrapAround": false, "lazyLoad": true, "bgLazyLoad": true, "pageDots": false }'>
      <?
      foreach($listFotos as $image) {
         $datos_img = UtilsBasic::InputFile_getFile($image->file_foto, $subdir_uploads);
      ?>
        <div class="carousel-cell">
           <img class="carousel-cell-image" data-flickity-lazyload="<?=$datos_img['ruta_completa']?>">
        </div>
      <? } ?>
   </div>

   <? if(count($listFotos) > 1) { ?>
       <div class="carousel carousel-nav"
            data-flickity='{ "asNavFor": ".Galery_slider .carousel-main", "contain": true, "pageDots": false }'>
          <?
          foreach($listFotos as $image) {
             $datos_img = UtilsBasic::InputFile_getFile($image->file_foto, $subdir_uploads);
             ?>
             <div class="carousel-cell">
                <img class="carousel-cell-image" src="<?=$datos_img['ruta_completa_th']?>">
             </div>
             <?
          }
          ?>
       </div>
   <? } ?>
</div>
