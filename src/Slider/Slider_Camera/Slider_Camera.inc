<?
/**
 * Utiliza la librería: Camera slideshow
 *   www.pixedelic.com, https://github.com/pixedelic/Camera
 */

namespace angelrove\frontobjs;

use angelrove\utils\Vendor;
use angelrove\utils\CssJs_load;


class Slider_Camera
{
   private $id_slider = 'Slider_Camera';
   private $images = false;
   private $images_subdir = '';
   private $options = '';

   //-------------------------------------------------
   /*
    * $images: id, file_foto, nombre, texto
    */
   function __construct($images, $images_subdir)
   {
      //--------
      $this->images = $images;
      $this->images_subdir = $images_subdir;

      //--------
      Vendor::usef('camera');

      $path = Vendor::get_path('Slider_Camera');
      CssJs_load::set(URL_VENDOR.$path.'styles.css');
   }
   //-------------------------------------------------
   public function set_id($id_slider)
   {
      $this->id_slider = $id_slider;
   }
   //-------------------------------------------------
   public function set_options($options)
   {
      $this->options = $options;
   }
   //-------------------------------------------------
   public function show()
   {
      if(!$this->images) {
         return false;
      }

      /*
       imagePath: '../images/', //he path to the image folder (it serves for the blank.gif, when you want to display videos)

       easing: 'easeInOutExpo',  //for the complete list http://jqueryui.com/demos/effect/easing.html

       fx: 'random', //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
      // can use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'

      */
      CssJs_load::set_script("
        jQuery('#".$this->id_slider."').camera({
           fx: 'random',

           // hover: false,
           // opacityOnGrid: false,

           height: '35%', // 'auto', '50%', '390px'
           loader: 'bar',
           playPause: false,
           pagination: false,
           thumbnails: false,

           portrait:   false, // if you don't want that your images are cropped
           alignment: 'center', // topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
           hover: true, // true, false. Pause on state hover

           time: 5000,  // milliseconds
           transPeriod: 1500, // lenght of the sliding effect in milliseconds

           ".$this->options."
        });
      ");

      // Tmpl -----
      include('tmpl.inc');
   }
   //-------------------------------------------------
}
