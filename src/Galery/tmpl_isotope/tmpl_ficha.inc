
<div class="grid-item col-lg-<?=$bootstrap_col?> col-sm-4 col-xs-6">
  <a id="t_<?=$foto->id?>" class="thumb" href="<?=$lightbox_link?>" <?=$lightbox_params?>>
    <?=$htmImg?>

    <?php  if($title) { ?>
      <div class="thumb_overlay thumb_overlay-<?=$this->conf_titulo?>">
         <h4><?=$title?></h4>
         <p><?=$foto->texto?></p>
      </div>
    <?php  } ?>
  </a>
</div>