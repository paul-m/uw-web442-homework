<?php
namespace PaulM;

class TruckTest
  extends \PHPUnit_Framework_TestCase {

  /**
   * Regression test against the spec.
   */
  public function testTruckInterface() {
    // Create a Truck object, passing some arguments so we
    // don't generate an exception.
    $truck = new Truck(0,0);
    // From the spec: honk() = 'honk honk'
    $this->assertEquals($truck->honk(), '');
  }
}

