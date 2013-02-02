<?php
namespace PaulM;

/**
 * @file
 * Implement a Car subclass of Vehicle.
 */

class Car extends Vehicle implements VehicleInterface {
  /**
   * Car honk function.
   * @return string Empty string.
   */
  public function honk() {
    return '';
  }
}

