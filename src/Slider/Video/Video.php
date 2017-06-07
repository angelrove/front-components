<?php
/**
 * Slider Video
 *
 */

namespace angelrove\front_components\Slider\Video;

use angelrove\front_components\Slider\Slider;
use angelrove\utils\CssJsLoad;
use angelrove\utils\Vendor;


class Video extends Slider
{
    //------------------------------------------
    public function __construct(array $images, $images_subdir)
    {
        parent::__construct($images, $images_subdir);
        $this->id_slider = 'Slider_Video';

        //--------
        // Vendor::usef('video-js');
        CssJsLoad::set(__DIR__ . '/styles.css');
    }
    //-------------------------------------------------
    public function set_height($value)
    {
        if (!$value) {
            return;
        }

        CssJsLoad::set_css_block('
            .slider-video .height_video {
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
           .slider-video .moving-background video {
              opacity: '.$value.';
           }
        ');
    }
    //------------------------------------------
    /*
     *  $images->: file_img, nombre, descripcion
     */
    public function show()
    {
        if (!$this->images) {
            return false;
        }

        // CssJsLoad::set_script("
        // ");

        include 'tmpl.inc';
    }
    //------------------------------------------
}
