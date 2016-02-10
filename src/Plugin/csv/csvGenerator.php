<?php

/**
 * @file
 * Contains \FanCourier\Plugin\csv\csvGenerator.
 */

namespace FanCourier\Plugin\csv;

use FanCourier\Plugin\csv\csvItem;
use CURLFile;

/**
 * Class to generate CSV.
 *
 * @author csaba.balint@reea.net
 */
abstract class csvGenerator {

  use csvMapping;

  /**
   * Name of the temporary CSV file.
   *
   * @var string 
   */
  private $tmpfname;

  /**
   * The csv file.
   *
   * @var file
   */
  private $csv;

  /**
   * New CURL file.
   *
   * @return CURLFile
   *   Return file object for a CURL request.
   */
  public function getFile() {
    return new CURLFile($this->tmpfname, 'text/csv', 'fisier');
  }

  /**
   * Creating a temporary csv file in memory.
   */
  public function createFile() {
    $this->tmpfname = tempnam("/tmp", "FanCourier");
    $this->csv = fopen($this->tmpfname, 'a');
    fputcsv($this->csv, $this->getHeader(), ',', chr(0));
  }

  /**
   * Add a new line into the CSV file.
   *
   * @param csvItem $item
   *   New line of CSV file.
   *   @see \FanCourier\Plugin\csv\csvItem
   */
  public function addNewItem(csvItem $item) {
    fputcsv($this->csv, $item->getItem(), ',', chr(0));
  }

  /**
   * Transforming the temporary csv file into text(Mostly for test use).
   *
   * @return string
   */
  public function csvToText() {
    $fp = fopen($this->tmpfname, "r");
    $csv = stream_get_contents($fp);
    fclose($fp);
    return $csv;
  }

  /**
   * Close the temporary file.
   */
  public function __destruct() {
    fclose($this->csv);
  }

}
