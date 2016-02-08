<?php

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class printAwb implements endpointInterface {

  protected $url_html = 'https://www.selfawb.ro/view_awb_integrat.php';
  protected $url_pdf = 'https://www.selfawb.ro/view_awb_integrat_pdf.php';
  protected $user;

  public static function setUp($user) {
    return new printAwb($user);
  }

  public function __construct($user) {
    $this->user = $user;
  }

  public function getHtml($awb, $type = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
      'nr' => $awb,
    );

    if ($type) {
      $post['type'] = $type;
    }

    $curl = new Curl($this->url_html);
    $rp = $curl->curlRequest($post);

    if ($rp['info']['http_code'] == 200) {
      return $rp['response'];
    }
    else {
      throw new Exception($rp['response']);
    }
  }

  /**
   * Get AWB in PDF format.
   *
   * @param type $awb
   *   AWB number.
   * @param type $page
   *   Pdf page type: A4,A5,A6
   * @param type $type
   *   0 or 1. For $page A6 $type = 1
   * @param type $label
   *   Number.
   */
  public function getPdf($awb, $page = NULL, $type = NULL, $label = NULL) {

    $post = array(
      'username' => $this->user->name,
      'client_id' => $this->user->id,
      'user_pass' => $this->user->pass,
      'nr' => $awb,
    );

    if ($page) {
      $post['page'] = $page;
    }
    if ($type) {
      $post['type'] = $type;
    }
    if ($label) {
      $post['label'] = $label;
    }

    $curl = new Curl($this->url_pdf);
    $rp = $curl->curlRequest($post);

    if ($rp['info']['http_code'] == 200) {
      return $rp['response'];
    }
    else {
      throw new Exception($rp['response']);
    }
  }

}
