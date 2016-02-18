<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\exportOrders.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier orders export.
 *
 * @author csaba.balint@reea.net
 */
class exportOrders extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_comenzi_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['data']);
  }

}
