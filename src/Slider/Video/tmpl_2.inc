<?php
use angelrove\utils\FileUploaded;

$video_src = array_values($this->images)[0];
$datos_img = FileUploaded::getInfo($video_src->file_img, $this->images_subdir);
?>

<video
    id="my-player"
    class="video-js"
    preload="auto"
    autoplay
    loop
    aspectRatio ="1:1"
    style="width:100%;height: 440px",
    data-setup='{}'
    >
   <source src="<?=$datos_img['ruta_completa']?>" type="video/mp4">
</video>
