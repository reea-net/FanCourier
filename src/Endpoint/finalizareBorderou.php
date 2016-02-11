<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\finalizareBorderou.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\csv\csvGenerator;
use FanCourier\Plugin\Curl;

/**
 * Controller for FanCourier docket finalization.
 *
 * @author csaba.balint@reea.net
 */
class finalizareBorderou extends csvGenerator implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/finalizare_borderou_integrat.php';

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
   * @return \FanCourier\Endpoint\finalizareBorderou
   */
  public static function setUp($user) {
    return new finalizareBorderou($user);
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
   * Finalize docket.
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function finalizare() {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
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
