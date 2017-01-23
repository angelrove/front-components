<?
/**
 *
 */

namespace angelrove\front_components\CanvasImageCrop;

use angelrove\utils\CssJsLoad;


// Libs ----
CssJsLoad::set(__DIR__.'/scripts.js');


class CanvasImageCrop
{
  //--------------------------------------------------------------------
  public static function get_thumb($id, $img, $width, $height, $alt)
  {
    $srcX = 0;
    $srcY = 0;
    // $alt = htmlentities($alt);

    //----
    $datosImg = @getimagesize($_SERVER['DOCUMENT_ROOT'].$img);
    $img_width  = $datosImg[0];
    $img_height = $datosImg[1];

    if($img_height && $img_height < $height) {
       $height = $img_height;

       $srcX = 0;
       $srcY = 0;
    }
    else {
       $srcX = 0;
       //$srcY = 0; // crop top
       $srcY = ($img_height - $height) / 2; // crop al centro
    }

    //----
    CssJsLoad::set_script(
      'CanvasImageCrop_draw("canvas_'.$id.'", "'.$img.'", '.$srcX.', '.$srcY.', '.$width.', '.$height.');'
    );

    //----
    return '<canvas id="canvas_'.$id.'" class="img-responsive" width="'.$width.'" height="'.$height.'" alt="'.$alt.'"></canvas>';
  }
  //--------------------------------------------------------------------
}
