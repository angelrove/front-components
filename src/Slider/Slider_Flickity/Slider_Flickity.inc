<?
/**
 * Utiliza la librería: Flickity
 *   http://flickity.metafizzy.co/
 */

namespace angelrove\frontobjs;

use angelrove\utils\Vendor;
use angelrove\utils\CssJs_load;

class Slider_Flickity
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

      $path = Vendor::get_path('Slider_Flickity');
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

      CssJs_load::set_script("
        $('#main_slider .carousel').flickity({
          wrapAround: true,
          lazyLoad: true,
          bgLazyLoad: true,
          cellAlign: 'center',
          autoPlay: true,

          ".$this->options."
        });
      ");

      // Tmpl -----
      include('tmpl.inc');
   }
   //-------------------------------------------------
}
