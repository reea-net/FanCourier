<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\newOrder.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

/**
 * Controller for FanCourier new Order.
 *
 * @author csaba.balint@reea.net
 */
class newOrder extends Endpoint {

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/comanda_curier_integrat.php';

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(
        [
          'pers_contact',
          'tel',
          'email',
          'greutate',
          'inaltime',
          'lungime',
          'latime',
          'ora_ridicare',
        ]
    );
  }

}
