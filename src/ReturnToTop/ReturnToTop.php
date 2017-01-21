<?
/**
 * ReturnToTop
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 * 2016
 */

namespace angelrove\front_components\ReturnToTop;

use angelrove\utils\CssJsLoad;
use angelrove\utils\Vendor;


class ReturnToTop
{
   //----------------------------------------------------
   function __construct()
   {
      // Libs ---
      $path = Vendor::get_path_vendor(__NAMESPACE__, __CLASS__);
      CssJsLoad::set($path.'/scripts.js');
      CssJsLoad::set($path.'/styles.css');
   }
   //----------------------------------------------------
   function show()
   {
      echo '<a href="javascript:" id="return-to-top" class="bt-return-to"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>';
   }
   //----------------------------------------------------
   function show_toBottom()
   {
      echo '<a href="javascript:" id="return-to-bottom" class="bt-return-to"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>';
   }
   //----------------------------------------------------
}