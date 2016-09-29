<?
/**
 * PCookies
 *  @author José A. Romero Vegas <jangel.romero@gmail.com>
 *  2016
*/

namespace angelrove\frontobjs;

use angelrove\utils\CssJs_load;
use angelrove\utils\Vendor;


// Libs ----
$path = Vendor::get_path('PCookies');
CssJs_load::set(URL_VENDOR.$path.'scripts.js');
CssJs_load::set(URL_VENDOR.$path.'styles.css', true);


class PCookies
{
   //----------------------------------------------------------
   static function show($show_flag=true)
   {
      if($show_flag) {
         $path = Vendor::get_path('PCookies');
         include_once('tmpl.inc');
      }
   }
   //----------------------------------------------------------
}