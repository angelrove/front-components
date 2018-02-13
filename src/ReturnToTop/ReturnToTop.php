<?php
/**
 * ReturnToTop
 * @author José A. Romero Vegas <jangel.romero@gmail.com>
 * 2016
 */

namespace angelrove\front_components\ReturnToTop;

use angelrove\utils\CssJsLoad;

class ReturnToTop
{
    //----------------------------------------------------
    public function __construct()
    {
        // Libs ---
        CssJsLoad::set(__DIR__ . '/scripts.js');
        CssJsLoad::set(__DIR__ . '/styles.css');
    }
    //----------------------------------------------------
    public function show()
    {
        echo '<a href="javascript:" id="return-to-top" class="bt-return-to"><i class="fas fa-chevron-up" aria-hidden="true"></i></a>';
    }
    //----------------------------------------------------
    public function show_toBottom()
    {
        echo '<a href="javascript:" id="return-to-bottom" class="bt-return-to"><i class="fas fa-chevron-down" aria-hidden="true"></i></a>';
    }
    //----------------------------------------------------
}
