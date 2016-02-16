<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\deleteAwb.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier delete AWB.
 *
 * @author csaba.balint@reea.net
 */
class deleteAwb extends Endpoint {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/delete_awb_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['AWB']);
  }

}
