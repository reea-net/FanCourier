<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Localitati.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\Curl;

/**
 * Controller for FanCourier distance info.
 *
 * @author csaba.balint@reea.net
 */
class Localitati implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_distante_integrat.php';

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
   * @return \FanCourier\Endpoint\Localitati
   */
  public static function setUp($user) {
    return new Localitati($user);
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
   * Get distance info.
   *
   * @param string $judet
   *   Romanian county (Optional).
   * @param string $language
   *   Language of response ro|en (Optional).
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getLocalitati($judet = NULL, $language = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
    );

    if ($judet) {$post['judet'] = $judet;}
    if ($language) { $post['language'] = $language;}

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
