<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\awbGenerator.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier new AWB number/s.
 *
 * @author csaba.balint@reea.net
 */
class awbGenerator extends Endpoint {

  use \FanCourier\Plugin\csv\csvGenerator;
  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/import_awb_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['fisier']);
  }

}
