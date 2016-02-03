<?php

namespace FanCurier\Plugin;

use Exception;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class Curl {

  private $url;

  public function __construct($url) {
    $this->url = $url;
  }

  public function curlRequest($post) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    return [
      'info' => $info,
      'response' => $output,
    ];
  }

}
