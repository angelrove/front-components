<?
use angelrove\utils\FileUploaded;

$video_src = array_values($this->images)[0];
$datos_img = FileUploaded::getInfo($video_src->file_img, $this->images_subdir);
?>

<div class="slider-video">
  <div class="table-row hero">
     <div id="hero" class="height_video hero-bg moving-background filler hero-video-still video-loaded">
        <div class="video-caption">
          <div class="title animated"><?=$video_src->nombre?></div>
          <div class="description animated"><?=nl2br($video_src->descripcion)?></div>
        </div>

        <div class="novideo-bg"></div>

        <video autoplay loop muted>
           <source src="<?=$datos_img['ruta_completa']?>" type="video/mp4">
        </video>
     </div>
  </div>
</div>
