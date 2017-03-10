<?php
/**
 * Utiliza la librería: Camera slideshow
 *  www.pixedelic.com, https://github.com/pixedelic/Camera
 */

namespace angelrove\front_components\Slider\Camera;

use angelrove\front_components\Slider\Slider;
use angelrove\utils\CssJsLoad;
use angelrove\utils\Vendor;

class Camera extends Slider
{
    private $options;

    //-------------------------------------------------
    public function __construct(array $images, $images_subdir)
    {
        parent::__construct($images, $images_subdir);
        $this->id_slider = 'Slider_Camera';

        //--------
        Vendor::usef('camera');

        CssJsLoad::set(__DIR__ . '/styles.css');
        // CssJsLoad::set(__DIR__.'/scripts.js');
    }
    //-------------------------------------------------
    public function set_height($height)
    {
        $this->height = $height;
    }
    //-------------------------------------------------
    public function set_opacity($value)
    {
        if (!$value) {
            return;
        }

        CssJsLoad::set_css_block('
            #main_slider .camera_target {
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

        /*
        imagePath: '../images/', //he path to the image folder (it serves for the blank.gif, when you want to display videos)

        easing: 'easeInOutExpo',  //for the complete list http://jqueryui.com/demos/effect/easing.html

        fx: 'random', //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
        // can use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'

         */

        // height ('auto', '50%', '390px') ---
        $height = ($this->height)? $this->height : '35%';

        //---------
        CssJsLoad::set_script("
        jQuery('#" . $this->id_slider . "').camera({
           fx: 'random',

           // hover: false,
           // opacityOnGrid: false,

           height:     '$height',
           loader:     'bar',
           playPause:  false,
           pagination: false,
           thumbnails: false,

           portrait:   false, // if you don't want that your images are cropped
           alignment: 'center', // topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
           hover: true, // true, false. Pause on state hover

           time: 5000,  // milliseconds
           transPeriod: 1500, // lenght of the sliding effect in milliseconds

           " . $this->options . "
        });
      ");

        // Tmpl -----
        include 'tmpl.inc';
    }
    //-------------------------------------------------
}
