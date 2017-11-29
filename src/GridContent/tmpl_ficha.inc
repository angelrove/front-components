
<div id="item_<?=++$c?>" class="theCol col-lg-<?=$bootstrap_col_lg?> col-md-<?=$bootstrap_col_md?> col-xs-<?=$bootstrap_col_xs?>">

  <div class="panel panel-default">
     <?php  if($foto->nombre) { ?>
       <div class="panel-heading"><h3><?=$foto->nombre?></h3></div>
     <?php  } ?>

     <div class="panel-body">
       <?=$htm_img?>

       <?php  if($foto->texto) { ?>
         <div class="text"><?=$foto->texto?></div>
       <?php  } ?>
     </div>
  </div>

</div>
