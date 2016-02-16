<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Servicii.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier services.
 *
 * @author csaba.balint@reea.net
 */
class Servicii extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_servicii_integrat.php';

}
