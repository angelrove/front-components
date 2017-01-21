<?
/**
 * WInputColor
 *
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
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
  function __construct($name, $tipo='', $theme='ambiance')
  {
    // CodeMirror ------
    CssJsLoad::set_css(URL_VENDOR."/codemirror-5.19.0/doc/docs.css");
    CssJsLoad::set_css(URL_VENDOR."/codemirror-5.19.0/lib/codemirror.css");
    CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/lib/codemirror.js");

    CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/addon/selection/active-line.js");
    CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/addon/edit/matchbrackets.js");

    // CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/keymap/sublime.js");

    CssJsLoad::set_css(URL_VENDOR."/codemirror-5.19.0/addon/hint/show-hint.css");
    CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/addon/hint/show-hint.js");
    CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/addon/hint/css-hint.js");

    CssJsLoad::set_css(URL_VENDOR."/codemirror-5.19.0/theme/".$theme.".css");
    CssJsLoad::set_js(URL_VENDOR."/codemirror-5.19.0/mode/".$tipo.'/'.$tipo.".js");

    //------------------
    $path = Vendor::get_path('WInputCode');
    CssJsLoad::set($path.'styles.css');
    CssJsLoad::set($path.'libs.js');

    //------------------
    $this->name  = $name;
    $this->theme = $theme;
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
