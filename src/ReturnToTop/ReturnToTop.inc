<?
/**
 * ReturnToTop
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 * 2016
 */

namespace angelrove\front_components;

use angelrove\utils\CssJs_load;
use angelrove\utils\Vendor;


class ReturnToTop
{
   //----------------------------------------------------
   function __construct()
   {
      // Libs ---
      $path = Vendor::get_path('ReturnToTop');
      CssJs_load::set($path.'scripts.js');
      CssJs_load::set($path.'styles.css');
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