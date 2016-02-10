<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\exportBorderou.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\Curl;

/**
 * Controller for FanCourier borderou export.
 *
 * @author csaba.balint@reea.net
 */
class exportBorderou implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_borderou_integrat.php';

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
   * @return \FanCourier\Endpoint\exportBorderou
   */
  public static function setUp($user) {
    return new exportBorderou($user);
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
   * Get borderou by date.
   *
   * @param string $date
   *   Date for borderou.
   * @param string $mode
   *   Filter the returned value by: (Optional).
   *     0 - Only Self AWB generated.
   *     1 - ALL
   * @param string $language
   *   Language of response ro|en (Optional).
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getBorderou($date, $mode = NULL, $language = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
    );

    if ($date) {$post['data'] = $date;}
    if ($mode) {$post['mode'] = $mode;}
    if ($language) {$post['language'] = $language;}

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
