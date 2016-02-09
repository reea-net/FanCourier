<?php

/**
 * @file
 * Contains \FanCurier\Endpoint\endpointManagerInterface.
 */

namespace FanCurier\Endpoint;

/**
 * Interface for endpointManager abstract class.
 *
 * @author csaba.balint@reea.net
 */
interface endpointManagerInterface {
  public function getEndpoint($endpoint, array $params = []);
}
