<?
/**
 * Utiliza la librería: Flickity
 *   http://flickity.metafizzy.co/
 */

namespace angelrove\front_components\Slider\Flickity;

use angelrove\utils\Vendor;
use angelrove\utils\CssJsLoad;


class Flickity
{
   private $id_slider = 'Slider_Flickity';
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
      Vendor::usef('Flickity');

      CssJsLoad::set(__DIR__.'/styles.css');
      CssJsLoad::set(__DIR__.'/scripts.js');
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

      // Tmpl -----
      include('tmpl.inc');
   }
   //-------------------------------------------------
}
