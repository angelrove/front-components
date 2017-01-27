<?
/**
 *  @author José A. Romero Vegas <jangel.romero@gmail.com>
 *  2016
 *
 */

namespace angelrove\front_components;

use angelrove\utils\CssJsLoad;


class ReCaptcha
{
  private $secret_key;

  //------------------------------------------------------------------
  function __construct($site_key, $secret_key)
  {
    $this->site_key   = $site_key;
    $this->secret_key = $secret_key;

    CssJsLoad::set('https://www.google.com/recaptcha/api.js');
  }
  //------------------------------------------------------------------
  public function getCaptcha()
  {
     echo '<div class="g-recaptcha" data-sitekey="'.$this->site_key.'"></div>';
  }
  //------------------------------------------------------------------
  public function isValid()
  {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $url_params = '?secret='.$this->secret_key.'&response='.$_POST['g-recaptcha-response'];

    $response = file_get_contents($url.$url_params);
    $data = json_decode($response);

    // DEBUG ----
    // print_r2($url.$url_params); print_r2($data); exit();

    // OK
    if(isset($data->success) && $data->success == true) {
       return 1;
    }
    // KO
    else {
       return 0;
    }
  }
  //------------------------------------------------------------------
}
