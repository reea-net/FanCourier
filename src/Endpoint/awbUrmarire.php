<?php

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class awbUrmarire implements endpointInterface {

  protected $url = 'https://www.selfawb.ro/awb_tracking_integrat.php';
  protected $user;

  public static function setUp($user) {
    return new awbUrmarire($user);
  }

  public function __construct($user) {
    $this->user = $user;
  }

  public function getStatus($awb, $display = 1, $language = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
      'AWB' => $awb,
      'display_mode' => $display,
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
