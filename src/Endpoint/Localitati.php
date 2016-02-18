<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Localitati.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier distance info.
 *
 * @author csaba.balint@reea.net
 */
class Localitati extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_distante_integrat.php';

}
