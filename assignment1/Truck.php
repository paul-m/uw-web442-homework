<?php

/**
 * @file
 * Implement a Car subclass of Vehicle.
 */
require_once('Vehicle.php');
require_once('VehicleInterface.php');

class Truck extends Vehicle implements VehicleInterface {
  /**
   * Truck honk function.
   * @return string Empty string.
   */
  public function honk() {
    return '';
  }
}

