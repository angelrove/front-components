<?
/**
 * Galery
 */

namespace angelrove\front_components\galery;

use angelrove\utils\UtilsBasic;
use angelrove\utils\Vendor;
use angelrove\utils\CssJsLoad;

use angelrove\front_components\canvasimagecrop\CanvasImageCrop;


class Galery
{
   private $id_galery;
   private $conf_options = '';
   private $conf_tipo;
   private $conf_max_cols = 4;

   //-------------------------------------------------------------
   function __construct($id_galery, $conf_tipo, $conf_canvas, $conf_titulo)
   {
      // Libs -------
      Vendor::usef('lightbox');

      // Options ---
      $this->id_galery   = $id_galery;
      $this->id_obj_galery = 'Galery_'.$id_galery;

      $this->conf_tipo   = $conf_tipo;
      $this->conf_canvas = $conf_canvas;
      $this->conf_titulo = $conf_titulo;

      // Tipo de galería ---
      $this->tmpl_dir_tipo = 'tmpl_'.$this->conf_tipo;

      // libs ---
      $path = Vendor::get_path_vendor(__NAMESPACE__, __CLASS__);

      CssJsLoad::set($path.'/'.$this->tmpl_dir_tipo.'/style.css');
      CssJsLoad::set($path.'/'.$this->tmpl_dir_tipo.'/script.js');

      switch ($this->conf_tipo) {
         case 'isotope':
            Vendor::usef('isotope');
            // CssJs_load::set_script('');
         break;

         case 'slider':
            Vendor::usef('Flickity');
         break;
      }
   }
   //-------------------------------------------------------------
   public function set_options($options)
   {
      $this->conf_options = $options;
   }
   //-------------------------------------------------------------
   public function set_maxCols($conf_max_cols)
   {
      if($conf_max_cols) {
         $this->conf_max_cols = $conf_max_cols;
      }
   }
   //-------------------------------------------------------------
   // $listFotos: file_foto, nombre, texto, url
   public function get($listFotos, $subdir_uploads)
   {
      if(!$listFotos) {
         return false;
      }

      //-----
      $bootstrap_col = (12 / $this->conf_max_cols);

      // Type: slider ---
      if($this->conf_tipo == 'slider') {
         // Out -----------
         ob_start();
         require($this->tmpl_dir_tipo.'/tmpl_main.inc');
         return ob_get_clean();
      }

      // Type: other ----
      $htmListFotos = '';
      $c = 0;
      foreach($listFotos as $foto)
      {
         $img     = UtilsBasic::InputFile_getFile($foto->file_foto, $subdir_uploads);
         $img_alt = htmlentities($foto->nombre);
         $title   = ($this->conf_titulo == 'hidden')? '' : $foto->nombre;

         // Image ------
         $htmImg = '';
         if($this->conf_tipo == 'isotope' && $this->conf_canvas) {
            $htmImg = CanvasImageCrop::get_thumb($foto->id, $img['ruta_completa_th'], 320, 210, $img_alt);
         } else {
            $htmImg = '<img src="'.$img['ruta_completa_th'].'" class="img-responsive" alt="'.$img_alt.'">';
         }

         // Lightbox ------
         $lightbox_link = '';
         if($foto->url) {
            $lightbox_link = $foto->url;
            $lightbox_params = 'target="_blank"';
         }
         else {
            $lightbox_link = $img['ruta_completa'];
            $lightbox_params = 'data-lightbox="'.$this->id_obj_galery.'"';
         }

         // tmpl Ficha -----
         ob_start();
         include($this->tmpl_dir_tipo.'/tmpl_ficha.inc');
         $htmListFotos .= ob_get_clean();
         //-----------------
      }

      // Out -----------
      ob_start();
      require($this->tmpl_dir_tipo.'/tmpl_main.inc');
      return ob_get_clean();
   }
   //-------------------------------------------------------------
}