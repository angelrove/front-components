<?php
use angelrove\utils\FileUploaded;
?>

<div id="main_slider" class="Slider_Bootstrap border_shadow">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-wrap="true">

    <!-- Indicators -->
    <?php  if(count($this->images) > 1) { ?>
      <ol class="carousel-indicators">
        <?php
        $c=0;
        foreach($this->images as $image) {
        ?>
           <li data-target="#myCarousel" data-slide-to="<?=$c++?>"></li>
        <?php  } ?>
      </ol>
    <?php  } ?>
    <!-- /Indicators -->

    <!-- Images -->
    <div class="carousel-inner" role="listbox">
      <?php
      $active = 'active';
      foreach($this->images as $image)
      {
         $datos_img = FileUploaded::getInfo($image->file_img, $this->images_subdir);
         ?>

         <div class="item <?=$active?>">
           <div class="fill" style="background-image:url('<?=$datos_img['ruta_completa']?>');"></div>
           <!-- img src="<?php //=$datos_img['ruta_completa']?>" -->

           <?php  if($image->name) { ?>
             <div class="carousel-caption animated" id="carousel-caption-<?=$image->id?>">
               <div class="caption-title animated"><?=$image->name?></div>
               <div class="caption-description animated"><?=nl2br($image->descripcion)?></div>
             </div>
           <?php  } ?>
         </div>

      <?php  $active = ''; } ?>
    </div>
    <!-- /Images -->

    <!-- Controls -->
    <?php  if(count($this->images) > 1) { ?>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
    <?php  } ?>
    <!-- /Controls -->

  </div>
</div>
