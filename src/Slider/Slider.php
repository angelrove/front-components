<?php
/**
 * Slider
 *
 */

namespace angelrove\front_components\Slider;

use angelrove\utils\CssJsLoad;

abstract class Slider
{
    protected $id_slider;
    protected $images = false;
    protected $images_subdir;
    protected $height;
    protected $opacity;

    //------------------------------------------
    /*
     * $images: [id], [file_foto], [name], [texto]
     */
    public function __construct(array $images, $images_subdir)
    {
        $this->images        = $images;
        $this->images_subdir = $images_subdir;
    }
    //-------------------------------------------------
    public function set_id($id_slider)
    {
        $this->id_slider = $id_slider;
    }
    //-------------------------------------------------
    abstract public function set_height($value);
    abstract public function set_opacity($value);
    abstract public function show();
    //------------------------------------------
}
