<?php
/**
 * Slider_Bootstrap
 *
 */

namespace angelrove\front_components\Slider\Bootstrap;

use angelrove\front_components\Slider\Slider;
use angelrove\utils\CssJsLoad;

class Bootstrap extends Slider
{
    //------------------------------------------
    public function __construct(array $images, $images_subdir)
    {
        parent::__construct($images, $images_subdir);
        $this->id_slider = 'Slider_Bootstrap';

        //--------
        CssJsLoad::set(__DIR__ . '/styles.css');
    }
    //-------------------------------------------------
    public function set_height($value)
    {
        if (!$value) {
            return;
        }

        CssJsLoad::set_css_block('
            #main_slider {
                height: '.$value.';
            }
        ');
    }
    //-------------------------------------------------
    public function set_opacity($value)
    {
        if (!$value) {
            return;
        }

        CssJsLoad::set_css_block('
            #myCarousel .fill {
                opacity: '.$value.';
            }
        ');
    }
    //------------------------------------------
    /*
     *  $images->: file_img, name, descripcion
     */
    public function show()
    {
        if (!$this->images) {
            return false;
        }

        // CssJsLoad::set_script("");

        include 'tmpl.inc';
    }
    //------------------------------------------
}
