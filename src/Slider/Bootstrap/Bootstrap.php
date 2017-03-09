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
    /*
     * $images: id, file_foto, nombre, texto
     */
    public function __construct(array $images, $images_subdir)
    {
        //--------
        $this->images        = $images;
        $this->images_subdir = $images_subdir;

        //--------
        CssJsLoad::set(__DIR__ . '/styles.css');
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
            #main_slider {
                height: '.$height.';
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

        // CssJsLoad::set_script("");

        include 'tmpl.inc';
    }
    //------------------------------------------
}
