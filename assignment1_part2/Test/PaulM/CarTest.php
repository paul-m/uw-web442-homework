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
    // Car is an abstract class, so we have to
    // make a mock object.
    $stub = $this->getMockBuilder('PaulM\Car')
      ->setConstructorArgs(array(1,1))
      ->getMockForAbstractClass();
    $this->assertEquals($stub->honk(), '');
  }
}

