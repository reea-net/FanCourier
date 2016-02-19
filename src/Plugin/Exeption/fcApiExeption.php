<?php

/**
 * @file
 * Contains \FanCourier\Plugin\Exception\fcApiExeption.
 */

namespace FanCourier\Plugin\Exeption;

use Exception;

/**
 * Exception controller class.
 *
 * @author csaba.balint@reea.net
 */
class fcApiExeption extends Exception {

  /**
   * @see Exception::__construct()
   */
  public function __construct($message = "", $code = 0, fcApiExeption $previous = null) {

    $message .= "<br/>\r\nOn line: " . parent::getLine() . ' at ' . parent::getFile();
    parent::__construct($message, $code, $previous);
  }

}
