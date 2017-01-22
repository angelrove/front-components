<?
/**
 * PCookies
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 * 2016
 */

namespace angelrove\front_components\PCookies;

use angelrove\utils\CssJsLoad;
use angelrove\utils\Vendor;


class PCookies
{
   private $link_legaldoc;

   //----------------------------------------------------------
   function __construct($link_legaldoc)
   {
      $this->link_legaldoc = $link_legaldoc;

      $path = Vendor::get_path_vendor(__NAMESPACE__, __CLASS__);
      CssJsLoad::set($path.'/styles.css');
      CssJsLoad::set($path.'/scripts.js');
   }
   //----------------------------------------------------------
   function show($show_flag=true)
   {
      if($show_flag) {
         include_once('tmpl.inc');
      }
   }
   //----------------------------------------------------------
}