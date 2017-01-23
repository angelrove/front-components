<?
/**
 * WInputColor
 *
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 *
 */

namespace angelrove\front_components\WInputCode;

use angelrove\utils\Vendor;
use angelrove\utils\CssJsLoad;


class WInputCode
{
  private $name = '';
  private $theme = '';
  private $func_on_change = false;

  //---------------------------------------------------------------------
  function __construct($name, $type='', $theme='ambiance')
  {
    // Codemirror lib ---
    include_once('_vendor.inc');
    Vendor::usef('codemirror');

    //------------------
    $this->name  = $name;
    $this->theme = $theme;

    //------------------
    $path = Vendor::get_path_vendor(__NAMESPACE__, __CLASS__);
    CssJsLoad::set($path.'styles.css');
    CssJsLoad::set($path.'libs.js');
  }
  //---------------------------------------------------------------------
  function set_function_on_change() {
     $this->func_on_change = true;
  }
  //---------------------------------------------------------------------
  function show($value)
  {
    if($this->func_on_change) {
       $str_on_change = "WInputCode_change('$this->name');";
    }

    return <<<EOD

<!-- WInputCode -->
<style>
.CodeMirror {
   height: 80vh;
   border: 1px solid black;
}
.CodeMirror span {
  font-size: 13px; font-family:Consolas;
}
.cm-s-zenburn {
  background-color: #222;
}
.cm-s-zenburn .CodeMirror-gutters {
  background: #323131 !important;
}
</style>

<div style="width: 100%;">
<textarea id="$this->name" class="codemirror-textarea_$this->name" name="$this->name">$value</textarea>
</div>

<script>
var theme = '$this->theme';

$(document).ready(function() {

  editores['$this->name'] = CodeMirror.fromTextArea($(".codemirror-textarea_$this->name")[0], {
    selectionPointer: true,
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true,
    autorefresh:true,
    extraKeys: {"Ctrl-Space": "autocomplete"},
  });
  editores['$this->name'].setOption("theme", theme);

  editores['$this->name'].on('change', function(e) {
    // console.log("debug: "+'$this->name');
    $str_on_change
  });

});
</script>
<!-- /WInputCode -->

EOD;

  }
  //---------------------------------------------------------------------
}
