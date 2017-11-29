<?php
use angelrove\utils\FileUploaded;
?>

<div id="galery_<?=$this->id_galery?>" class="Galery_slider">
   <div class="carousel carousel-main"
        data-flickity='{ "wrapAround": false, "lazyLoad": true, "bgLazyLoad": true, "pageDots": false }'>
      <?php
      foreach($listFotos as $image) {
         $datos_img = FileUploaded::getInfo($image->file_foto, $subdir_uploads);
      ?>
        <div class="carousel-cell">
           <img class="carousel-cell-image" data-flickity-lazyload="<?=$datos_img['ruta_completa']?>">
        </div>
      <?php  } ?>
   </div>

   <?php  if(count($listFotos) > 1) { ?>
       <div class="carousel carousel-nav"
            data-flickity='{ "asNavFor": ".Galery_slider .carousel-main", "contain": true, "pageDots": false }'>
          <?php
          foreach($listFotos as $image) {
             $datos_img = FileUploaded::getInfo($image->file_foto, $subdir_uploads);
             ?>
             <div class="carousel-cell">
                <img class="carousel-cell-image" src="<?=$datos_img['ruta_completa_th']?>">
             </div>
             <?php
          }
          ?>
       </div>
   <?php  } ?>
</div>
