<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\exportBorderou.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier docket export.
 *
 * @author csaba.balint@reea.net
 */
class exportBorderou extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_borderou_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['data']);
  }

}
