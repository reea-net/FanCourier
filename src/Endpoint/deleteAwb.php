<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\deleteAwb.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier delete AWB.
 *
 * @author csaba.balint@reea.net
 */
class deleteAwb implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/delete_awb_integrat.php';

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
   * @return \FanCurier\Endpoint\deleteAwb
   */
  public static function setUp($user) {
    return new deleteAwb($user);
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
   * Delete awb.
   *
   * @param int $awb
   *   Awb number.
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function delete($awb) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
      'AWB' => $awb,
    );

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
