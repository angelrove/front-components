<?php
/**
 * PCookies
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 * 2016
 */

namespace angelrove\front_components\PCookies;

use angelrove\utils\CssJsLoad;

class PCookies
{
    private $link_legaldoc;
    private $lang;

    //----------------------------------------------------------
    public function __construct($link_legaldoc, $lang='es')
    {
        $this->link_legaldoc = $link_legaldoc;
        $this->lang          = $lang;

        //---------
        if ($this->lang != 'es' && $this->lang != 'en') {
            $this->lang = 'en';
        }

        if ($this->lang == 'en') {
            $this->link_legaldoc = 'https://en.wikipedia.org/wiki/HTTP_cookie';
        }

        //---------
        CssJsLoad::set(__DIR__ . '/styles.css');
        CssJsLoad::set(__DIR__ . '/scripts.js');
    }
    //----------------------------------------------------------
    public function show($show_flag = true)
    {
        if ($show_flag) {
            include_once 'tmpl.inc';
        }
    }
    //----------------------------------------------------------
}
