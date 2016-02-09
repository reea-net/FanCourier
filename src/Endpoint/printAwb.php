<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\printAwb.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\Curl;

/**
 * Controller for FanCurier print AWB.
 *
 * @author csaba.balint@reea.net
 */
class printAwb implements endpointInterface {

  /**
   * Endpoint url for HTML response.
   *
   * @var string 
   */
  protected $url_html = 'https://www.selfawb.ro/view_awb_integrat.php';

  /**
   * Endpoint url for PDF response.
   *
   * @var string 
   */
  protected $url_pdf = 'https://www.selfawb.ro/view_awb_integrat_pdf.php';

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
   * @return \FanCurier\Endpoint\printAwb
   */
  public static function setUp($user) {
    return new printAwb($user);
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
   * Get AWB in HTML format.
   *
   * @param int $awb
   *   AWB number.
   * @param int $type
   *   Type of AWB.
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
   */
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
   * @param int $awb
   *   AWB number.
   * @param string $page
   *   Pdf page type: A4,A5,A6
   * @param int $type
   *   0 or 1. For $page A6 $type = 1
   * @param int $label
   *   Number.
   *
   * @return array
   *
   * @throws Exception
   *   Error exeption recived from API.
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
