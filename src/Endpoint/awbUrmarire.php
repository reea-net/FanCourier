<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\awbUrmarire.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier new AWB tracking.
 *
 * @author csaba.balint@reea.net
 */
class awbUrmarire implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/awb_tracking_integrat.php';

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
   * @return \FanCurier\Endpoint\awbUrmarire
   */
  public static function setUp($user) {
    return new awbUrmarire($user);
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
   * Return status of the package.
   *
   * @param int $awb
   *   AWB number.
   * @param int $display
   *   1 - Last status
   *   2 - Last status from route history
   *   3 - All statuses
   * @param string $language
   *   Language of response ro|en (Optional).
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
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
