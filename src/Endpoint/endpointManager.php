<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\endpointManager.
 */

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\endpointManagerInterface;
use Exception;

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
   * @throws Exception
   *   No endpoint exeption.
   */
  public function getEndpoint($endpoint, array $params = []) {
    if (class_exists("FanCourier\\Endpoint\\" . $endpoint)) {
      return call_user_func_array('FanCourier\\Endpoint\\' . $endpoint . '::setUp', $params);
    }
    else {
      throw new Exception('The requested endpoint does not exist.');
    }
  }

}
