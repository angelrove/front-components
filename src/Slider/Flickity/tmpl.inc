<?
use angelrove\utils\FileUploaded;
$c=0;
?>

<div id="main_slider" class="Slider_Flickity border_shadow">
   <div class="carousel">
      <?
      foreach($this->images as $image) {
         $datos_img = FileUploaded::getInfo($image->file_foto, $this->images_subdir);
      ?>
        <div class="carousel-cell" id="cell_<?=$image->id?>" title="<?=$image->nombre?>">
           <img class="carousel-cell-image" data-flickity-lazyload="<?=$datos_img['ruta_completa']?>">

           <? if($image->nombre) { ?>
             <div class="carousel-caption animated" id="carousel-caption-<?=$image->id?>">
               <div class="caption-title animated"><?=$image->nombre?></div>
               <div class="caption-description animated"><?=nl2br($image->texto)?></div>
             </div>
           <? } ?>
        </div>
      <? } ?>
   </div>
</div>
