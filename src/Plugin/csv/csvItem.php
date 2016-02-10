<?php

/**
 * @file
 * Contains \FanCourier\Plugin\csv\csvItem.
 */

namespace FanCourier\Plugin\csv;

/**
 * Class to create new csv line.
 *
 * @author csaba.balint@reea.net
 */
class csvItem {

  use csvMapping;

  /**
   * Array containing the csv item.
   *
   * @var array 
   */
  private $item;

  /**
   * Creat a blank csv item.
   */
  public function __construct() {
    $this->item = array_fill(0, count($this->getMachinNames()) - 1, '');
  }

  /**
   * New item.
   *
   * @return \FanCourier\Plugin\csv\csvItem
   */
  public static function newItem() {
    return new csvItem();
  }

  /**
   * Update column by ID.
   *
   * @param type $key
   *   CSV column id.
   *   @see \FanCourier\Plugin\csv\csvMapping::getMachinNames()
   * @param type $value
   *   Value of the 
   */
  public function setItem($key, $value) {
    $this->setItems([$key => $value]);
  }

  /**
   * Update multiple columns by ID.
   *
   * @staticvar type $map
   *   Machine names of the csv columns.
   *
   * @param array $items
   *   Array of columns values.
   */
  public function setItems(array $items) {
    static $map;

    if (!$map) {
      $map = $this->getMachinNames();
    }
    foreach ($items as $key => $value) {
      $this->item[$map[$key]] = $value;
    }
  }

  /**
   * Return the saved csv line.
   * 
   * @return array
   *   CSV line.
   */
  public function getItem() {
    return $this->item;
  }

}
