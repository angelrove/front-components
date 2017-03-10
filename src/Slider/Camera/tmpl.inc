<?
use angelrove\utils\FileUploaded;
?>

<div id="main_slider" class="Slider_Camera border_shadow">
<div id="<?=$this->id_slider?>" class="myCarousel camera_wrap camera_azure_skin">
   <?
   foreach($this->images as $image) {
      $datos_img = FileUploaded::getInfo($image->file_foto, $this->images_subdir);
   ?>

      <div data-thumb="<?=$datos_img['ruta_completa_th']?>" data-src="<?=$datos_img['ruta_completa']?>">

        <!-- <div class="camera_caption fadeFromRight"><?//=$image->nombre?></div> -->

        <? if($image->nombre) { ?>
          <div class="carousel-caption animated" id="carousel-caption-<?=$image->id?>">
            <div class="caption-title animated"><?=$image->nombre?></div>
            <div class="caption-description animated"><?=nl2br($image->texto)?></div>
          </div>
        <? } ?>

      </div>

   <? } ?>
</div>
<div style="clear:both"></div>
</div>