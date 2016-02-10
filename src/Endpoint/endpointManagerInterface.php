<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\endpointManagerInterface.
 */

namespace FanCourier\Endpoint;

/**
 * Interface for endpointManager abstract class.
 *
 * @author csaba.balint@reea.net
 */
interface endpointManagerInterface {
  public function getEndpoint($endpoint, array $params = []);
}
