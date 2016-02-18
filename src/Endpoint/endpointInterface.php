<?php

/**
 * @file
 * Contains \FanCourier\Endpoint\endpointInterface.
 */

namespace FanCourier\Endpoint;

/**
 * Interface for Endpoint controller classes.
 *
 * @author csaba.balint@reea.net
 */
interface endpointInterface {

  public static function newEndpoint();

  public function getResult();

  public function setParams(array $post_params);

  public function checkErrors();
}
