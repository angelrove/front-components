<?php
use angelrove\utils\FileUploaded;
?>

<div id="main_slider" class="Slider_Camera border_shadow">
<div id="<?=$this->id_slider?>" class="myCarousel camera_wrap camera_azure_skin">
   <?php
   foreach($this->images as $image) {
      $datos_img = FileUploaded::getInfo($image->file_foto, $this->images_subdir);
   ?>

      <div data-thumb="<?=$datos_img['ruta_completa_th']?>" data-src="<?=$datos_img['ruta_completa']?>">

        <!-- <div class="camera_caption fadeFromRight"><?php //=$image->name?></div> -->

        <?php  if($image->name) { ?>
          <div class="carousel-caption animated" id="carousel-caption-<?=$image->id?>">
            <div class="caption-title animated"><?=$image->name?></div>
            <div class="caption-description animated"><?=nl2br($image->texto)?></div>
          </div>
        <?php  } ?>

      </div>

   <?php  } ?>
</div>
<div style="clear:both"></div>
</div>