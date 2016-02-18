<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Strazi.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier streets.
 *
 * @author csaba.balint@reea.net
 */
class Strazi extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_strazi_integrat.php';

}
