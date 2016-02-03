<?php

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class Servicii implements endpointInterface {

  protected $url = 'https://www.selfawb.ro/export_servicii_integrat.php';
  protected $user;

  public static function setUp($user) {
    return new Servicii($user);
  }

  public function __construct($user) {
    $this->user = $user;
  }

  public function getServicii() {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
    );

    $curl = new Curl($this->url);
    $rp =  $curl->curlRequest($post);
    
    if ($rp['info']['http_code'] == 200) {
      $response = str_getcsv($rp['response'], "\n");
      unset($response[0]);
      return $response;
    }
    else {
      throw new Exception($rp['response']);
    }
  }

}
