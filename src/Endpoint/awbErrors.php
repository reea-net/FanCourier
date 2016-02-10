<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\awbErrors.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\csv\csvGenerator;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier AWB errors.
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
   * @return \FanCurier\Endpoint\awbErrors
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
