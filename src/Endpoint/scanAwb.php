<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\scanAwb.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier scan AWB.
 *
 * @author csaba.balint@reea.net
 */
class scanAwb extends Endpoint {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/download_awb_scan_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['AWB']);
  }

}
