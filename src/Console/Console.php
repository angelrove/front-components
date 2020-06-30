<?php
/**
 * Leer: README_CONFIG.md
 */

namespace angelrove\front_components\Console;

use angelrove\utils\CssJsLoad;

class Console
{
    static private $flushBuffer;
    static private $activeBuffer;
    static private $key_session;

    //------------------------------------------------------------
    static public function _init($console_id='console-sess', $activeBuffer=true)
    {
        // key_session
        self::$key_session = $console_id;

        // Para cuando no es por ajax (false)
        self::$activeBuffer = $activeBuffer;

        self::cleanFlush();

        if (self::$activeBuffer) {
            ob_implicit_flush(true);
            self::$flushBuffer = str_repeat(' ', 1024*64);
        }
    }
    //------------------------------------------------------------
    static public function getConsole($console_id='console-sess', $height=305, $getFlush=true)
    {
        // key_session
        self::$key_session = $console_id;

        CssJsLoad::set(__DIR__ . '/console.js');
        include_once 'tmpl_console.php';
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
        if (isset($_SESSION[self::$key_session])) {
            $_SESSION[self::$key_session] .= $string;
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
        return ($_SESSION[self::$key_session])?? '';
    }
    //------------------------------------------------------------
    static public function endFlush()
    {
        $text = ob_get_clean();
        echo $text;

        $_SESSION[self::$key_session] .= $text;
    }
    //------------------------------------------------------------
    static public function cleanFlush()
    {
        $_SESSION[self::$key_session] = '';
    }
    //------------------------------------------------------------
}
