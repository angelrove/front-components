<?
/**
*
*/

namespace angelrove\front_components\GridContent;

use angelrove\utils\UtilsBasic;
use angelrove\utils\CssJsLoad;
// use angelrove\front_components\CanvasImageCrop\CanvasImageCrop;


class GridContent
{
   private $id_galerya;
   private $conf_max_cols;
   private $conf_style;

   //-------------------------------------------------------------
   function __construct($id_grid, $conf_max_cols, $conf_style)
   {
      $this->id_grid       = $id_grid;
      $this->conf_max_cols = $conf_max_cols;
      $this->conf_style    = $conf_style;

      // Libs ----
      CssJsLoad::set(__DIR__.'/style.css');
   }
   //-------------------------------------------------------------
   // $listFotos[]: file_foto, nombre, texto, url
   public function get($listFotos, $subdir_uploads='')
   {
      if(!$listFotos) {
         return false;
      }

      // Config. ----
      $bootstrap_col_md = 6;
      $bootstrap_col_xs = 12;

      $bootstrap_col_lg = ($this->conf_max_cols) ? (12 / $this->conf_max_cols) : 12;
      if($bootstrap_col_lg == 12) {
         $bootstrap_col_md = 12;
      }

      // List fotos ----
      $htmListFotos = '';
      $c = 0;
      foreach($listFotos as $foto)
      {
         // Image ------
         $datos_img = UtilsBasic::InputFile_getFile($foto->file_foto, $subdir_uploads);
         $htm_img   = UtilsBasic::get_htm_img($datos_img, '', $foto->nombre, '', false, $foto->url);
         $foto->nombre = ($foto->url)? '<a href="'.$foto->url.'">'.$foto->nombre.'</a>' : $foto->nombre;

         // tmpl Ficha -----
         ob_start();
         include('tmpl_ficha.inc');
         $htmListFotos .= ob_get_clean();
      }

      // tmpl main -----
      ob_start();
      require('tmpl_main.inc');
      $outHtm = ob_get_clean();

      return $outHtm;
   }
   //-------------------------------------------------------------
}