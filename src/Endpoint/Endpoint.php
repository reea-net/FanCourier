<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Endpoint.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointInterface;
use FanCourier\Plugin\Curl;

/**
 * Endpoint controller class.
 *
 * @author csaba.balint@reea.net
 */
abstract class Endpoint implements endpointInterface {

  use paramError;

  /**
   * Result of CURL request.
   *
   * @var array
   */
  public $result = NULL;

  /**
   * If result is a csv file keep or not the header.
   *
   * @var bool
   */
  public $result_with_header = TRUE;

  /**
   * New controller class.
   *
   * @return \FanCourier\Endpoint\class
   */
  public static function newEndpoint() {
    $class = get_called_class();
    return new $class();
  }

  /**
   * Set params for CURL call.
   *
   * @param array $post_params
   */
  public function setParams(array $post_params) {
    $this->post_params = $post_params;
  }

  /**
   * Make CURL call.
   *
   * @throws Exception
   */
  public function curlCall() {

    $this->checkErrors();

    $curl = new Curl($this->url);
    $rp = $curl->curlRequest($this->post_params);

    if ($rp['info']['http_code'] == 200) {
      $this->result = $rp['response'];
    }
    else {
      throw new Exception($rp['response']);
    }
  }

  /**
   * Return curl call result.
   *
   * @return type
   */
  public function getResult() {
    $this->curlCall();
    return $this->result;
  }

  /**
   * Set no header value. 
   */
  public function noHeader() {
    $this->result_with_header = FALSE;
  }

  /**
   * Convert csv/text to array.
   */
  public function csvToArray() {
    $this->result = str_getcsv($this->result, "\n");
    if (!$this->result_with_header) {
      unset($this->result[0]);
    }
  }

}
