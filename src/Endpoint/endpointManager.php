<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\endpointManager.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointManagerInterface;
use FanCourier\Plugin\Exeption\fcApiExeption;

/**
 * endpointManager abstract class.
 *
 * @author csaba.balint@reea.net
 */
abstract class endpointManager implements endpointManagerInterface {

  /**
   * Returning the endpoint controller.
   *
   * @param string $endpoint
   *   Name of the endpoint controller.
   * @param array $params
   *   Array of params to send for ::setUp function.
   *
   * @return object
   *    Endpoint conroller.
   *
   * @throws fcApiExeption
   *   No endpoint exeption.
   */
  public function getEndpoint($endpoint) {
    if (class_exists("FanCourier\\Endpoint\\" . $endpoint)) {
      return call_user_func('FanCourier\\Endpoint\\' . $endpoint . '::newEndpoint');
    }
    else {
      throw new fcApiExeption("Unrecognized endpoint: `$endpoint`.", 400);
    }
  }

}
