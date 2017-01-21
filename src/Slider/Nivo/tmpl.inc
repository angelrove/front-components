
<!--
 <img src="xxx" data-thumb="xxx" title="xxx" data-transition="slideInLeft" />
 <a href="http://dev7studios.com"><img src="xxx" data-thumb="xxx" title="This is an example of a caption" /></a>
 -->

<style type="text/css">
.nivoSlider img{max-height:500px !important; }
.nivo-main-image{max-height:500px !important;}
</style>

<div id="wrapper">

  <div class="slider-wrapper theme-light">
      <div id="<?=self::$id_slider?>" class="nivoSlider">
         <? foreach($images as $key => $value) { ?>
             <img src="<?=$value?>" title="<?=$value?>" />
         <? } ?>
      </div>

      <div id="htmlcaption" class="nivo-html-caption">
         <strong>This</strong> is an example of a <em>HTML</em> caption.
      </div>
  </div>

</div>
