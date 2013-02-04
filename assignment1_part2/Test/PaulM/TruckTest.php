<?php
namespace PaulM;

class TruckTest
  extends \PHPUnit_Framework_TestCase {

  /**
   * Regression test against the spec.
   */
  public function testTruckInterface() {
    // Truck is an abstract class, so we have to
    // make a mock object.
    $stub = $this->getMockBuilder('PaulM\Truck')
      ->setConstructorArgs(array(1,1))
      ->getMockForAbstractClass();
    $this->assertEquals($stub->honk(), '');
  }
}

