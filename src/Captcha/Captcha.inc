<?
/**
 *  @author José A. Romero Vegas <jangel.romero@gmail.com>
 *  2006
 *
 *  //-- (formulario.php) ---------
 *   <?
 *   $inputCaptcha = new Captcha();
 *   ?>
 *   <form action="sendMail.php" method="post">
 *     <? $inputCaptcha->getCaptcha(); ¿>
 *   </form>
 *
 *  //-- (sendMail.php) -----------
 *   if(Captcha::isValid()) {
 *      [OK]
 *   }
 */

namespace angelrove\front_components;

use angelrove\utils\CssJs_load;
use angelrove\utils\Vendor;


class Captcha {
  private $id    = '1';
  private $label = 'Cambiar palabra';

  private $error = '';
  private $style = '';

  //------------------------------------------------------------------
  function __construct() {
    if(!session_id()) {
       session_start();
    }
  }
  //------------------------------------------------------------------
  public function setID($id) {
    $this->id = $id;
  }
  //------------------------------------------------------------------
  public function setError($error) {
    $this->error = $error;
  }
  //------------------------------------------------------------------
  public function setStyle($style) {
    $this->style = $style;
  }
  //------------------------------------------------------------------
  public function setLabel($label) {
    if($label) {
       $this->label = $label;
    }
  }
  //------------------------------------------------------------------
  public function getCaptcha()
  {
    $path = Vendor::get_path('Captcha');

    // $url_captcha = URL_VENDOR.'/'.$path.'cool-php-captcha-0.3/captcha.php?id='.$this->id;
    $url_captcha = '/_vendor'.$path.'cool-php-captcha-0.3/captcha.php?id='.$this->id;

    $img_src = $url_captcha.'&amp;t='.$_SERVER['REQUEST_TIME'];

    CssJs_load::set_script('
      $(document).ready(function() {
        $(".imgCaptcha a.update").click(function(event) {
          event.preventDefault();
          $("#imgCaptchaImg_'.$this->id.'").attr("src", "'.$url_captcha.'&amp;t="+Math.random());
          return false;
        });
      });
    ', 'utils-Captcha');

    ?>
    <style>
    .imgCaptcha {
      width:245px;
      padding:4px;
      border:1px solid #ccc;
      border-radius: 4px;
    }
    .imgCaptcha .theImg { position: relative; }
    .imgCaptcha img {
       border:1px solid #eee;
       vertical-align:top;
       width: 100%;
       margin-bottom: 2px;
    }
    .imgCaptcha a.update {
       position: absolute; top: 4px;right:3px;
       color: #337ab7; font-size: 24px;
       border: 1px solid #ccf; border-radius: 16px;
       padding: 0px 4px;
       background-color: #fff;
     }
    .imgCaptcha a.update:hover {
      border-color: #fff;
      color: #3897e8;
     }

    .imgCaptcha input {
      width: 99%;
      margin: auto;
    }
    .imgCaptcha .error  { font-weight:bold; font-size:11px; color:red; }
    .imgCaptcha .update { text-decoration:none; font-weight:normal; }

    <?=$this->style?>
    </style>

    <div class="imgCaptcha" id="imgCaptcha_<?=$this->id?>">
      <div class="theImg">
        <img alt="captcha" src="<?=$img_src?>" id="imgCaptchaImg_<?=$this->id?>">
        <a href="#" class="update small"><i class="fa fa-refresh" aria-hidden="true"></i></a>
      </div>
      <div class="texto">
        <div class="error"><?=$this->error?></div>
        <input type="text" name="imgCaptcha_code" class="form-control">
      </div>
    </div>
    <?
  }
  //------------------------------------------------------------------
  static function isValid($id='1')
  {
    if(!isset($_SESSION['ImgCaptcha_'.$id])) {
       $_SESSION['ImgCaptcha_'.$id] = '';
    }

    $captchaCode = $_SESSION['ImgCaptcha_'.$id];
    $userCode    = $_REQUEST['imgCaptcha_code'];

    // OK
    if($captchaCode && strtolower($userCode) == strtolower($captchaCode)) {
       // Eliminar variable de sesión
       $_SESSION['ImgCaptcha_'.$id] = '';

       return 1;
    }
    // KO
    else {
       return 0;
    }
  }
  //------------------------------------------------------------------
}
