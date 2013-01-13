<?php

/**
 * @file
 * Implement a Civic subclass of Car.
 */

require_once('Car.php');
require_once('VehicleInterface.php');

class Civic extends Car implements VehicleInterface {
  /**
   * Constructor method.
   *
   * Override the constructor so we can add our default values.
   *
   * @param int $year Model year.
   * @param int $doors Number of doors.
   */
  public function __construct($year = 1973, $doors = 2) {
    parent::__construct($year, $doors);
  }

  /**
   * Return our special Civic honk text
   * @return string
   */
  public function honk() {
    return 'honk honk';
  }
}

