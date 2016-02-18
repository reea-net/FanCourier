<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Observatii.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier notifications.
 *
 * @author csaba.balint@reea.net
 */
class Observatii extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_observatii_integrat.php';

}
