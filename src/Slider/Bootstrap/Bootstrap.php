<?php
/**
 * Slider_Bootstrap
 *
 */

namespace angelrove\front_components\Slider\Bootstrap;

use angelrove\utils\CssJsLoad;

class Bootstrap
{
    private $id_slider     = 'main_slider';
    private $images        = false;
    private $images_subdir = '';

    //------------------------------------------
    public function __construct($images, $images_subdir)
    {
        //--------
        $this->images        = $images;
        $this->images_subdir = $images_subdir;

        //--------
        CssJsLoad::set(__DIR__ . '/styles.css');
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

        // CssJsLoad::set_script("");

        include 'tmpl.inc';
    }
    //------------------------------------------
}
