<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\scanAwb.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier scan AWB.
 *
 * @author csaba.balint@reea.net
 */
class scanAwb implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/download_awb_scan_integrat.php';

  /**
   * FanCurier user.
   *
   * @var object 
   */
  protected $user;

  /**
   * New controller class.
   * 
   * @param type $user
   *   Login in credentials.
   *
   * @return \FanCurier\Endpoint\scanAwb
   */
  public static function setUp($user) {
    return new scanAwb($user);
  }

  /**
   * Constructor.
   *
   * @param object $user
   *   Login in credentials.
   */
  public function __construct($user) {
    $this->user = $user;
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
