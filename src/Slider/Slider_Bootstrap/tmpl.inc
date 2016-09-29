<?
use angelrove\utils\UtilsBasic;
?>

<div id="<?=$this->id_slider?>" class="border_shadow">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-wrap="true">

    <!-- Indicators -->
    <? if(count($this->images) > 1) { ?>
      <ol class="carousel-indicators">
        <?
        $c=0;
        foreach($this->images as $image) {
        ?>
           <li data-target="#myCarousel" data-slide-to="<?=$c++?>"></li>
        <? } ?>
      </ol>
    <? } ?>
    <!-- /Indicators -->

    <!-- Images -->
    <div class="carousel-inner" role="listbox">
      <?
      $active = 'active';
      foreach($this->images as $image)
      {
         $datos_img = UtilsBasic::InputFile_getFile($image->file_img, $this->images_subdir);
         ?>

         <div class="item <?=$active?>">
           <div class="fill" style="background-image:url('<?=$datos_img['ruta_completa']?>');"></div>
           <!-- img src="<?//=$datos_img['ruta_completa']?>" -->

           <? if($image->nombre) { ?>
             <div class="carousel-caption animated" id="carousel-caption-<?=$image->id?>">
               <div class="caption-title animated"><?=$image->nombre?></div>
               <div class="caption-description animated"><?=nl2br($image->descripcion)?></div>
             </div>
           <? } ?>
         </div>

      <? $active = ''; } ?>
    </div>
    <!-- /Images -->

    <!-- Controls -->
    <? if(count($this->images) > 1) { ?>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
    <? } ?>
    <!-- /Controls -->

  </div>
</div>
