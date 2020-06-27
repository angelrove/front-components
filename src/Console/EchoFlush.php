<?php
namespace angelrove\front_components\Console;

use angelrove\utils\CssJsLoad;

class EchoFlush
{
    static private $flushBuffer;
    static private $activeBuffer;

    //------------------------------------------------------------
    static public function _init($activeBuffer=true)
    {
        // Para cuando no es por ajax (false)
        self::$activeBuffer = $activeBuffer;

        self::cleanFlush();

        if (self::$activeBuffer) {
            ob_implicit_flush(true);
            self::$flushBuffer = str_repeat(' ', 1024*64);
        }
    }
    //------------------------------------------------------------
    static public function echo($string, $color='')
    {
        // Color --------
        switch ($color) {
            case 'ok':
                $color = 'greenyellow';
                break;

            case 'fail':
                $color = 'darkorange';
                break;
        }
        if ($color) {
            $string = '<span style="color:'.$color.'">'.$string.'</span>';
        }

        // Session -------
        if (isset($_SESSION['EchoFlush'])) {
            $_SESSION['EchoFlush'] .= $string;
        }

        // Flush ---------
        if (self::$activeBuffer) {
            echo $string;
            echo self::$flushBuffer; // buffer
        }
        // No flush ------
        else {
        }
    }
    //------------------------------------------------------------
    static public function getFlush()
    {
        return ($_SESSION['EchoFlush'])?? '';
    }
    //------------------------------------------------------------
    static public function endFlush()
    {
        $text = ob_get_clean();
        echo $text;

        $_SESSION['EchoFlush'] .= $text;
    }
    //------------------------------------------------------------
    static public function cleanFlush()
    {
        $_SESSION['EchoFlush'] = '';
    }
    //------------------------------------------------------------
    static public function getConsole($height=305, $getFlush=true)
    {
        CssJsLoad::set(__DIR__ . '/launch-process.js');
?>
<style>
#console_out {
   height: <?=$height?>px;
   background: black;
   color:#eee;
   font-family: monospace;
   padding: 6px;
   width: 100%; border-width:0;
   text-align: left;
   overflow: scroll;
}
</style>
<div id="console_out">
<?php

if ($getFlush) {
    echo self::getFlush();
}

?>
</div>
<?php
    }
    //------------------------------------------------------------
}
