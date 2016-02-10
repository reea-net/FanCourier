<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\awbErrors.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\csv\csvGenerator;
use FanCourier\Plugin\Curl;

/**
 * Controller for FanCourier AWB errors.
 *
 * @author csaba.balint@reea.net
 */
class awbErrors extends csvGenerator implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_lista_erori_imp_awb_integrat.php';

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
   * @return \FanCourier\Endpoint\awbErrors
   */
  public static function setUp($user) {
    return new awbErrors($user);
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
   * Get awb errors.
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getErrors() {

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
