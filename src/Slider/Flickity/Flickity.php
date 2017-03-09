<?php
/**
 * use: http://flickity.metafizzy.co/
 */

namespace angelrove\front_components\Slider\Flickity;

use angelrove\utils\CssJsLoad;

class Flickity
{
    private $id_slider     = 'Slider_Flickity';
    private $images        = false;
    private $images_subdir = '';
    // private $height;
    private $options = '';

    //-------------------------------------------------
    /*
     * $images: id, file_foto, nombre, texto
     */
    public function __construct(array $images, $images_subdir)
    {
        //--------
        $this->images        = $images;
        $this->images_subdir = $images_subdir;

        //--------
        // Vendor::usef('Flickity');

        CssJsLoad::set(__DIR__ . '/styles.css');
        CssJsLoad::set(__DIR__ . '/scripts.js');
    }
    //-------------------------------------------------
    public function set_id($id_slider)
    {
        $this->id_slider = $id_slider;
    }
    //-------------------------------------------------
    public function set_height($height)
    {
        switch ($height) {
            case 'all':
                $height = '80vh';
                break;
            case '':
                return;
            default:
                $height .= 'px';
                break;
        }

        CssJsLoad::set_css_block('
            #main_slider .carousel-cell {
                height: '.$height.';
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
