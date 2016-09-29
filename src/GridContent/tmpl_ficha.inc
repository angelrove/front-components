
<div id="item_<?=++$c?>" class="theCol col-lg-<?=$bootstrap_col_lg?> col-md-<?=$bootstrap_col_md?> col-xs-<?=$bootstrap_col_xs?>">

  <div class="panel panel-default">
     <? if($foto->nombre) { ?>
       <div class="panel-heading"><h3><?=$foto->nombre?></h3></div>
     <? } ?>

     <div class="panel-body">
       <?=$htm_img?>

       <? if($foto->texto) { ?>
         <div class="text"><?=$foto->texto?></div>
       <? } ?>
     </div>
  </div>

</div>
