<?php

/*
 * AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.
 */

namespace FanCurier\Plugin\csv;

/**
 * Description of csvItem
 *
 * @author csaba.balint@reea.net
 */
class csvItem {

  private $item;

  public function __construct($length = 34) {
    $this->item = range(0, $length);
  }

  public static function newItem($length = 34) {
    return new csvItem($length);
  }

  public function setAddress(array $address) {
    isset($address['judet']) ? $this->item[18] = $address['judet'] : NULL;
    isset($address['localitate']) ? $this->item[19] = $address['localitate'] : NULL;
    isset($address['strada']) ? $this->item[20] = $address['strada'] : NULL;
  }

  public function setItem($key, $value) {
    $this->item[$key] = $value;
  }

  public function getItem() {
    
    foreach ($this->item as $key => $value) {
      if(is_numeric($value)) {
        $this->item[$key] = '';
      }
    }
    
    return $this->item;
  }

}
