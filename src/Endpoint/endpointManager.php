<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointManagerInterface;
use Exception;

/**
 * Description of pluginManagerInterface
 *
 * @author balintcsaba89@gmail.com
 */
abstract class endpointManager implements endpointManagerInterface {

  public function getEndpoint($endpoint, $params = []) {
    if (class_exists("FanCurier\\Endpoint\\" . $endpoint)) {
      return call_user_func_array('FanCurier\\Endpoint\\' . $endpoint . '::setUp', $params);
    }else{
      throw new Exception('The requested endpoint does not exist.');
    }
  }
}
