<?
/**
 * Slider_Bootstrap
 *
 */

namespace angelrove\front_components;

use angelrove\utils\Vendor;
use angelrove\utils\CssJs_load;


class Slider_Bootstrap
{
   private $id_slider = 'main_slider';
   private $images = false;
   private $images_subdir = '';

   //------------------------------------------
   function __construct($images, $images_subdir)
   {
      //--------
      $this->images = $images;
      $this->images_subdir = $images_subdir;

      //--------
      $path = Vendor::get_path('Slider_Bootstrap');
      CssJs_load::set(URL_VENDOR.'/'.$path.'styles.css');
   }
   //------------------------------------------
   /*
    *  $images->: file_img, nombre, descripcion
    */
   function show()
   {
      if(!$this->images) {
         return false;
      }

      // CssJs_load::set_script("");

      include('tmpl.inc');
   }
   //------------------------------------------
}
