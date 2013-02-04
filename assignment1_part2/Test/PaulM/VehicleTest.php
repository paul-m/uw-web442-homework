<?php
namespace PaulM;

/**
 * @file
 * Testing the abstract Vehicle class with the
 * stub TestVehicle class.
 */

class VehicleTest
  extends \PHPUnit_Framework_TestCase {

  /**
   * Test constructor behavior with default values.
   *
   * @expectedException PaulM\NonExistantVehicleException
   */
  public function testVehicleDefaultConstructor() {
    $stub = $this->getMockForAbstractClass('PaulM\Vehicle');
  }

  /**
   * Test constructor behavior with valid arguments.
   */
  public function testVehicleConstructor() {
    // Should generate a valid Vehicle constructed
    // with year and doors.
    $stub = $this->getMockBuilder('PaulM\Vehicle')
      ->setConstructorArgs(array(23,77))
      ->getMockForAbstractClass();
    $this->assertEquals($stub->getYear(), 23);
    $this->assertEquals($stub->getNumberOfDoors(), 77);
  }
  
  public function generateNonIntegers() {
    $result = array();
    $types = array(FALSE, 0.1, 'stringy', array(1,1), new \stdClass(), NULL);
    foreach ($types as $first) {
      foreach ($types as $second) {
        $result[] = array($first, $second);
      }
    }
    return $result;
  }
  
  /**
   * Test non-integer constructor arguments.
   *
   * @dataProvider generateNonIntegers
   * @expectedException PaulM\NonExistantVehicleException
   */
  public function testNonIntegerConstructorArguments($a, $b) {
    $stub = $this->getMockBuilder('PaulM\Vehicle')
      ->setConstructorArgs(array($a,$b))
      ->getMockForAbstractClass();
  }
  
  /**
   * Test getters and setters.
   */
  public function testVehicleGettersAndSetters() {
    // TestVehicle construction that should generate a
    // valid TestVehicle with known year and doors.
    $stub = $this->getMockBuilder('PaulM\Vehicle')
      ->setConstructorArgs(array(23,77))
      ->getMockForAbstractClass();
    $this->assertEquals($stub->getYear(), 23);
    $this->assertEquals($stub->getNumberOfDoors(), 77);
    
    // Set and get some properties.
    $stub->setYear(1966);
    $this->assertEquals($stub->getYear(), 1966);
    $stub->setNumberOfDoors(4);
    $this->assertEquals($stub->getNumberOfDoors(), 4);
    
    // More harsh.
    $stub->setYear(PHP_INT_MAX);
    $this->assertEquals($stub->getYear(), PHP_INT_MAX);
    $stub->setNumberOfDoors(PHP_INT_MAX);
    $this->assertEquals($stub->getNumberOfDoors(), PHP_INT_MAX);
    $stub->setYear(~PHP_INT_MAX);
    $this->assertEquals($stub->getYear(), ~PHP_INT_MAX);
    $stub->setNumberOfDoors(~PHP_INT_MAX);
    $this->assertEquals($stub->getNumberOfDoors(), ~PHP_INT_MAX);
  }

  /**
   * Test setter for non-integer year values.
   *
   * @dataProvider generateNonIntegers
   * @expectedException \InvalidArgumentException
   */
  public function testNonIntegerYearSetter($a, $b) {
    $stub = $this->getMockBuilder('PaulM\Vehicle')
      ->setConstructorArgs(array(1,1))
      ->getMockForAbstractClass();
    $stub->setYear($a);
  }

  /**
   * Test setter for non-integer door values.
   *
   * @dataProvider generateNonIntegers
   * @expectedException \InvalidArgumentException
   */
  public function testNonIntegerDoorSetter($a, $b) {
    $stub = $this->getMockBuilder('PaulM\Vehicle')
      ->setConstructorArgs(array(1,1))
      ->getMockForAbstractClass();
    $stub->setNumberOfDoors($a);
  }

  /**
   * Test the describe method.
   */
  public function testVehicleDescribe() {
    $stub = $this->getMockBuilder('PaulM\Vehicle')
      ->setConstructorArgs(array(23,77))
      ->getMockForAbstractClass();
    $this->assertEquals($stub->describe(), 'This ' . get_class($stub) .
      ' is from model year 23, has 77 doors, and does not implement honk().');
  }
}

