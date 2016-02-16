<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\awbErrors.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier AWB errors.
 *
 * @author csaba.balint@reea.net
 */
class awbErrors extends Endpoint {

  use \FanCourier\Plugin\csv\csvResult;

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_lista_erori_imp_awb_integrat.php';

}
