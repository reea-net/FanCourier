<?php

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class Strazi implements endpointInterface {

  protected $url = 'https://www.selfawb.ro/export_strazi_integrat.php';
  protected $user;

  public static function setUp($user) {
    return new Strazi($user);
  }

  public function __construct($user) {
    $this->user = $user;
  }

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
