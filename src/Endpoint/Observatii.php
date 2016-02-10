<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Observatii.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\Curl;

/**
 * Controller for FanCourier notifications.
 *
 * @author csaba.balint@reea.net
 */
class Observatii implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_observatii_integrat.php';

  /**
   * FanCourier user.
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
   * @return \FanCourier\Endpoint\Observatii
   */
  public static function setUp($user) {
    return new Observatii($user);
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
   * Get notifications.
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getNotifications() {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
    );

    $curl = new Curl($this->url);
    $rp = $curl->curlRequest($post);

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
