<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\finalizareBorderou.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier docket finalization.
 *
 * @author csaba.balint@reea.net
 */
class finalizareBorderou extends Endpoint {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/finalizare_borderou_integrat.php';

}
