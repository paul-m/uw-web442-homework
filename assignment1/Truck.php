<?php

/**
 * @file
 * Implement a Car subclass of Vehicle.
 */
require_once('Vehicle.php');
require_once('VehicleInterface.php');

class Truck extends Vehicle implements VehicleInterface {
  public function honk() {
    return '';
  }
}

