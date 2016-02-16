<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\awbUrmarire.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier new AWB tracking.
 *
 * @author csaba.balint@reea.net
 */
class awbUrmarire extends Endpoint {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/awb_tracking_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['AWB', 'display_mode']);
  }

}
