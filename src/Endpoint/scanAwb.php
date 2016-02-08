<?php

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class scanAwb implements endpointInterface {

  protected $url = 'https://www.selfawb.ro/download_awb_scan_integrat.php';
  protected $user;

  public static function setUp($user) {
    return new scanAwb($user);
  }

  public function __construct($user) {
    $this->user = $user;
  }

  public function scan($awb, $language = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
      'AWB' => $awb,
    );

    if ($language) {
      $post['language'] = $language;
    }

    $curl = new Curl($this->url);
    $rp = $curl->curlRequest($post);

    if ($rp['info']['http_code'] == 200) {
      return $rp['response'];
    }
    else {
      throw new Exception($rp['response']);
    }
  }

}
