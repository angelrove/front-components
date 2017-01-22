<?
use angelrove\utils\UtilsBasic;
?>

<div id="main_slider" class="border_shadow Slider_Camera">
<div id="<?=$this->id_slider?>" class="myCarousel camera_wrap camera_azure_skin">
   <?
   foreach($this->images as $image) {
      $datos_img = UtilsBasic::InputFile_getFile($image->file_foto, $this->images_subdir);
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