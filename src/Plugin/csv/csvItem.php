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

  use csvMapping;

  private $item;

  public function __construct() {
    $this->item = array_fill(0, count($this->getMachinNames()) - 1, '');
  }

  public static function newItem() {
    return new csvItem();
  }

  public function setItem($key, $value) {
    $this->setItems([$key => $value]);
  }

  public function setItems(array $items) {
    static $map;

    if (!$map) {
      $map = $this->getMachinNames();
    }
    foreach ($items as $key => $value) {
      $this->item[$map[$key]] = $value;
    }
  }

  public function getItem() {
    return $this->item;
  }

}
