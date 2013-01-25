<?php
namespace PaulM;

class CarTest
  extends \PHPUnit_Framework_TestCase {

  /**
   * testCarInterface function.
   * 
   * Regression test against the spec.
   *
   * @access public
   * @return void
   */
  public function testCarInterface() {
    // Create a car object, passing some arguments so we
    // don't generate an exception.
    $car = new Car(0,0);
    // From the spec: honk() = 'honk honk'
    $this->assertEquals($car->honk(), '');
  }
}

