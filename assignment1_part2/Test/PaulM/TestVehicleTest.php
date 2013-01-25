<?php
namespace PaulM;

/**
 * @file
 * Testing the abstract Vehicle class with the
 * stub TestVehicle class.
 */

class TestVehicleTest
  extends \PHPUnit_Framework_TestCase {

  /**
   * Default constructor should return an exception.
   *
   * @expectedException PaulM\NonExistantVehicleException
   */
  public function testVehicleDefaultConstructor() {
    $testVehicle = new TestVehicle(-1, -1);
  }

  /**
   * Test the creation of TestVehicle objects.
   */
  public function testVehicleConstructor() {
    // TestVehicle construction that should generate a
    // valid TestVehicle with known year and doors.
    $testVehicle = new TestVehicle();
    $this->assertEquals($testVehicle->getYear(), 23);
    $this->assertEquals($testVehicle->getNumberOfDoors(), 77);
  }
  
  /**
   * Regression test against the spec.
   */
  public function testVehicleGettersAndSetters() {
    // TestVehicle construction that should generate a
    // valid TestVehicle with known year and doors.
    $testVehicle = new TestVehicle();
    $this->assertEquals($testVehicle->getYear(), 23);
    $this->assertEquals($testVehicle->getNumberOfDoors(), 77);
    
    // Set and get some properties.
    $testVehicle->setYear(1966);
    $this->assertEquals($testVehicle->getYear(), 1966);
    $testVehicle->setNumberOfDoors(4);
    $this->assertEquals($testVehicle->getNumberOfDoors(), 4);
  }
  
  /**
   * Test that we've implemented honk().
   */
  public function testVehicleInterface() {
    $testVehicle = new TestVehicle();
    $this->assertEquals($testVehicle->honk(), 'TestVehicleHonk');
  }
}

