<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\scanAwb.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier scan AWB.
 *
 * @author csaba.balint@reea.net
 */
class scanAwb extends Endpoint {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/download_awb_scan_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['AWB']);
  }

  /**
   * Scan awb number.
   *
   * @param int $awb
   *   AWB number.
   * @param string $language
   *   Language of response ro|en (Optional).
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
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
