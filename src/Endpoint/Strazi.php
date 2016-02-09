<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\Strazi.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier streets.
 *
 * @author csaba.balint@reea.net
 */
class Strazi implements endpointInterface {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_strazi_integrat.php';

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
   * @return \FanCurier\Endpoint\Strazi
   */
  public static function setUp($user) {
    return new Strazi($user);
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
   * Get streets.
   *
   * @param type $judet
   *   Romanian county (Optional).
   * @param type $localitate
   *   Romanian City (Optional).
   * @param type $language
   *   Language of response ro|en (Optional).
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
  public function getStrazi($judet = NULL, $localitate = NULL, $language = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
    );

    if ($judet) {
      $post['judet'] = $judet;
    }
    if ($localitate) {
      $post['localitate'] = $localitate;
    }
    if ($language) {
      $post['language'] = $language;
    }

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
