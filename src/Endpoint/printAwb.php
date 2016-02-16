<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\printAwb.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier print AWB.
 *
 * @author csaba.balint@reea.net
 */
class printAwb extends Endpoint {

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
   * Print result type.(html or pdf)
   *
   * @var string 
   */
  protected $type = 'html';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->url = $this->url_html;
    $this->setRequirements(['nr']);
  }

  /**
   * Set type of request/response. 
   *
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
    if ($type == 'html') {
      $this->url = $this->url_html;
    }
    else if ($type == 'pdf') {
      $this->url = $this->url_pdf;
    }
  }

}
