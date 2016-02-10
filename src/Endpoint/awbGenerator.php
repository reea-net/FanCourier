<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\awbGenerator.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\csv\csvGenerator;
use FanCourier\Plugin\Curl;

/**
 * Controller for FanCourier new AWB number/s.
 *
 * @author csaba.balint@reea.net
 */
class awbGenerator extends csvGenerator implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/import_awb_integrat.php';

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
   * @return \FanCourier\Endpoint\awbGenerator
   */
  public static function setUp($user) {
    return new awbGenerator($user);
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
   * Generate new awb numbers.
   *
   * @param file $file
   *   CSV file.
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getAwb($file) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
      'fisier' => isset($file) ? $file : $this->getFile(),
    );

    $curl = new Curl($this->url);
    $rp = $curl->curlRequest($post);

    if ($rp['info']['http_code'] == 200) {
      $response = str_getcsv($rp['response'], "\n");
      return $response;
    }
    else {
      throw new Exception($rp['response']);
    }
  }

}
