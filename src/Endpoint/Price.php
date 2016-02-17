<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\Price.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;
use Exception;

/**
 * Controller for FanCourier Price calculation. 
 *
 * @author csaba.balint@reea.net
 */
class Price extends Endpoint {

  /**
   * Cache the original requirements.
   *
   * @var array 
   */
  protected $requirements_cache = [];

  /**
   * Endpoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/tarif.php';

  /**
   * Type of the price calculation.
   *
   * @var string
   */
  protected $type = 'internal'; // `internal` or `export` price calculation.

  /**
   * Internal post requirements.
   *
   * @var array 
   */
  protected $requirements_internal = [
    'localitate_dest',
    'judet_dest',
    'plicuri',
    'colete',
    'greutate',
    'lungime',
    'latime',
    'inaltime',
    'val_decl',
    'plata_ramburs'
  ];

  /**
   * Internal export requirements.
   *
   * @var array 
   */
  protected $requirements_export = [
    'modtrim',
    'greutate',
    'pliccolet',
    's_inaltime',
    's_latime',
    's_lungime',
    'volum',
    'dest_tara',
    'tipcontinut',
    'km ext'
  ];

  /**
   * Set type of price calculation.
   *
   * @param string $type
   * @throws Exception
   */
  public function setType($type) {
    if ($type == 'internal' || $type == 'export') {
      switch ($type) {
        case 'internal':
          $this->setRequirements(array_merge($this->requirements_cache, $this->requirements_internal), TRUE);
          break;
        case 'export':
          $this->setRequirements(array_merge($this->requirements_cache, $this->requirements_export), TRUE);
          break;
      }
    }
    else {
      throw new Exception('Invalid type. Accepted values "internal" or "export"', 400);
    }
  }

  /**
   * Construct setups.
   */
  public function __construct() {
    $this->setRequirements(['serviciu']);
    $this->requirements_cache = $this->post_requirements;
    $this->setRequirements($this->requirements_internal);
  }

}
