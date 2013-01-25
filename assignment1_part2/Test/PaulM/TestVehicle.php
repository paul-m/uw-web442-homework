<?php
namespace PaulM;

/**
 * @file
 * TestVehicle is a stub class we use to test the behavior of
 * abstract class Vehicle.
 */

class TestVehicle
  extends Vehicle
  implements VehicleInterface {

  /**
   * Constructor function.
   *
   * Give our test class some known values.
   * 
   * @access public
   * @param int $year (default: 23)
   * @param int $doors (default: 77)
   * @return void
   */
  public function __construct($year = 23, $doors = 77) {
    parent::__construct($year, $doors);
  }

  /**
   * Implements VehicleInterface::honk().
   * 
   * @access public
   * @return void
   */
  public function honk() {
    return 'TestVehicleHonk';
  }

}

