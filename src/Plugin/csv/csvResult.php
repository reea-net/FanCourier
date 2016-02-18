<?php

/**
 * @file
 * Contains \FanCourier\Plugin\csv\csvResult.
 */

namespace FanCourier\Plugin\csv;

/**
 * Global csv result processing in endpoint.
 *
 * @author csaba.balint@reea.net
 */
trait csvResult {

  /**
   * Return curl call result.
   *
   * @return type
   */
  public function getResult() {
    parent::curlCall();
    parent::csvToArray();
    return $this->result;
  }

}
