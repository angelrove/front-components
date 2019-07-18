<?php
use angelrove\utils\FileUploaded;
$c=0;
?>

<div id="main_slider" class="Slider_Flickity border_shadow">
   <div class="carousel">
      <?php
      foreach($this->images as $image) {
         $datos_img = FileUploaded::getInfo($image->file_foto, $this->images_subdir);
      ?>
        <div class="carousel-cell" id="cell_<?=$image->id?>" title="<?=$image->name?>">
           <img class="carousel-cell-image" data-flickity-lazyload="<?=$datos_img['ruta_completa']?>">

           <?php  if($image->name) { ?>
             <div class="carousel-caption animated" id="carousel-caption-<?=$image->id?>">
               <div class="caption-title animated"><?=$image->name?></div>
               <div class="caption-description animated"><?=nl2br($image->texto)?></div>
             </div>
           <?php  } ?>
        </div>
      <?php  } ?>
   </div>
</div>
