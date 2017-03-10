<?php
/**
 * Slider_Flickity
 * use: http://flickity.metafizzy.co/
 */

namespace angelrove\front_components\Slider\Flickity;

use angelrove\front_components\Slider\Slider;
use angelrove\utils\CssJsLoad;

class Flickity extends Slider
{
    private $options = '';

    //-------------------------------------------------
    public function __construct(array $images, $images_subdir)
    {
        parent::__construct($images, $images_subdir);
        $this->id_slider = 'Slider_Flickity';

        //--------
        // Vendor::usef('Flickity');

        CssJsLoad::set(__DIR__ . '/styles.css');
        CssJsLoad::set(__DIR__ . '/scripts.js');
    }
    //-------------------------------------------------
    public function set_height($height)
    {
        if (!$height) {
            return;
        }

        CssJsLoad::set_css_block('
            #main_slider .carousel-cell {
                height: '.$height.';
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
            #main_slider .carousel-cell-image {
                opacity: '.$value.';
            }
        ');
    }
    //-------------------------------------------------
    public function set_options($options)
    {
        $this->options = $options;
    }
    //-------------------------------------------------
    public function show()
    {
        if (!$this->images) {
            return false;
        }

        // Tmpl -----
        include 'tmpl.inc';
    }
    //-------------------------------------------------
}
