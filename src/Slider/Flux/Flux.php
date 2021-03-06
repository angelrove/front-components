<?php
/**
 * Slider_Flux
 * Utiliza la librería: Flux Slide (http://www.joelambert.co.uk/flux/)
 *
 *   $vendor: '/sliders/vendor/Flux-Slide/js/flux.min.js',
 *            '/sliders/vendor/Flux-Slide/css/style.css';
 *
 *
 */

namespace angelrove\front_components\Slider\Flux;

use angelrove\utils\CssJsLoad;
use angelrove\utils\Vendor;

class Flux
{
    private $id_slider     = 'main_slider';
    private $images        = false;
    private $images_subdir = '';

    //------------------------------------------
    public function __construct(array $images, $images_subdir)
    {
        //--------
        $this->images        = $images;
        $this->images_subdir = $images_subdir;

        //--------
        Vendor::usef('flux-slide');

        CssJsLoad::set(__DIR__ . '/styles.css');
    }
    //------------------------------------------
    public function show()
    {
        CssJsLoad::set_script("
        $(function(){
          window.f = new flux.slider('#" . $this->id_slider . "', {
            pagination: true,
            captions: true,
            // width: '90%',
            // height: 400,
          });
        });
      ");

        // Tmpl -----
        include 'tmpl.inc';
    }
    //------------------------------------------
}
