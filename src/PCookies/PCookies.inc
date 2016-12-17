<?
/**
 * PCookies
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 * 2016
 */

namespace angelrove\front_components;

use angelrove\utils\CssJs_load;
use angelrove\utils\Vendor;


class PCookies
{
   //----------------------------------------------------------
   function __construct()
   {
      global $CONFIG_APP;

      // Libs ---
      $path = Vendor::get_path('PCookies');
      CssJs_load::set($path.'styles.css');
      CssJs_load::set($path.'scripts.js');
   }
   //----------------------------------------------------------
   function show($show_flag=true)
   {
      if($show_flag) {
         $url_doc = Vendor::get_url('PCookies').'doc.pdf';

         include_once('tmpl.inc');
      }
   }
   //----------------------------------------------------------
}