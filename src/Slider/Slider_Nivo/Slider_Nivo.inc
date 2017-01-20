<?
/**
 * Utiliza la librería: Nivo Slider
 *   https://github.com/gilbitron/Nivo-Slider
 *
    $vendor_js ['nivo-slider'] = '/vendor/Nivo-Slider/jquery.nivo.slider.pack.js';
    $vendor_css['nivo-slider'] = '/vendor/Nivo-Slider/nivo-slider.css';
    $vendor_css['nivo-slider-theme1'] = '/vendor/Nivo-Slider/themes/default/default.css';
    $vendor_css['nivo-slider-theme2'] = '/vendor/Nivo-Slider/themes/light/light.css';
    $vendor_css['nivo-slider-theme3'] = '/vendor/Nivo-Slider/themes/dark/dark.css';
    $vendor_css['nivo-slider-theme4'] = '/vendor/Nivo-Slider/themes/bar/bar.css';
 */

use angelrove\utils\Vendor;
use angelrove\utils\CssJsLoad;

class Slider_Nivo
{
   static $id_slider = 'main_slider_';
   private static $id_counter = 0;

   //------------------------------------------
   static function init()
   {
      Vendor::usef('nivo-slider');
      Vendor::usef('nivo-slider-theme1');
      Vendor::usef('nivo-slider-theme2');
      Vendor::usef('nivo-slider-theme3');
      Vendor::usef('nivo-slider-theme4');
   }
   //------------------------------------------
   static function show($images)
   {
      self::$id_slider .= self::$id_counter++;

      /*
       Effects: sliceDown, sliceDownRight, sliceDownLeft
                sliceUp, sliceUpRight, sliceUpLeft
                sliceUpDown, sliceUpDownRight, sliceUpDownLeft
                slideInRight, slideInLeft
                fold, fade
                boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
      */

      CssJsLoad::set_script("
        $(window).load(function() {
           $('#".self::$id_slider."').nivoSlider();
        });

        $('#".self::$id_slider."').nivoSlider({
            effect: 'random',            // Specify sets like: 'random','fold,fade,sliceDown'...
            directionNav: true,          // Next & Prev navigation
            controlNav: true,            // 1,2,3... navigation
            pauseOnHover: true,          // Stop animation while hovering
        });
      ";

      include 'tmpl.inc';
   }
   //------------------------------------------
}
