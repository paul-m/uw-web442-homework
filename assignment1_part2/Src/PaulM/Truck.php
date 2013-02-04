<?php
namespace PaulM;

/**
 * @file
 * Implement a Truck subclass of Vehicle.
 */

abstract class Truck extends Vehicle implements VehicleInterface {

  /**
   * Truck honk function.
   * @return string Empty string.
   */
  public function honk() {
    return '';
  }
}

