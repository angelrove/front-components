<?
/**
*
*/

namespace angelrove\frontobjs;

 use angelrove\utils\CssJs_load;
 use angelrove\utils\Vendor;


// Libs ----
$path = Vendor::get_path('ReturnToTop');
CssJs_load::set(URL_VENDOR.$path.'scripts.js');
CssJs_load::set(URL_VENDOR.$path.'styles.css', true);


class ReturnToTop
{
   //----------------------------------------------------
   static function show()
   {
      echo '<a href="javascript:" id="return-to-top" class="bt-return-to"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>';
   }
   //----------------------------------------------------
   static function show_toBottom()
   {
      echo '<a href="javascript:" id="return-to-bottom" class="bt-return-to"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>';
   }
   //----------------------------------------------------
}