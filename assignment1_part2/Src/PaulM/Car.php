<?php
namespace PaulM;

/**
 * @file
 * Implement a Car subclass of Vehicle.
 */

require_once('Vehicle.php');
require_once('VehicleInterface.php');

class Car extends Vehicle implements VehicleInterface {
  /**
   * Car honk function.
   * @return string Empty string.
   */
  public function honk() {
    return '';
  }
}

