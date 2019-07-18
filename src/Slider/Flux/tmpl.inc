<?php
use angelrove\utils\FileUploaded;
?>

<div id="<?=$this->id_slider?>">
   <?php
   foreach($this->images as $image) {
      $datos_img = FileUploaded::getInfo($image->file_img, $this->images_subdir);
   ?>
      <img src="<?=$datos_img['ruta_completa']?>" title="<?=$image->name?>" />
  <?php  } ?>
</div>
<div style="clear:both"></div>