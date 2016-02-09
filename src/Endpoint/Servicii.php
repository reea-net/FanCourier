<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\Servicii.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier services.
 *
 * @author csaba.balint@reea.net
 */
class Servicii implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_servicii_integrat.php';

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
   * @return \FanCurier\Endpoint\Servicii
   */
  public static function setUp($user) {
    return new Servicii($user);
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
   * List of the FanCourier services.
   *
   * @return array
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getServicii() {

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
