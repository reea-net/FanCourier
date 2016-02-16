<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\exportTransfers.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier transfers export.
 *
 * @author csaba.balint@reea.net
 */
class exportTransfers extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_raport_viramente_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['data']);
  }

}
