<?php
namespace PaulM;

class CivicTest
  extends \PHPUnit_Framework_TestCase {

  /**
   * testCivicCreation function.
   *
   * Test the creation of Civic objects.
   * 
   * @access public
   * @return void
   */
  public function testCivicCreation() {
    // Civic with default creator arguments.
    $civic = new Civic();
    $this->assertEquals($civic->getYear(), 1973);
    $this->assertEquals($civic->getNumberOfDoors(), 2);
    // Civic with our own creator arguments.
    $civic = new Civic(2015, 500);
    $this->assertEquals($civic->getYear(), 2015);
    $this->assertEquals($civic->getNumberOfDoors(), 500);
  }
  
  /**
   * testCivicInterface function.
   * 
   * Regression test against the spec.
   *
   * @access public
   * @return void
   */
  public function testCivicInterface() {
    $civic = new Civic();
    // From the spec: honk() = 'honk honk'
    $this->assertEquals($civic->honk(), 'honk honk');
  }
  
  /**
   * testCivicDescription function.
   * 
   * @access public
   * @return void
   */
  public function testCivicDescription() {
    $civic = new Civic();
    $this->assertEquals($civic->describe(), 'This PaulM\Civic is from model year 1973, has 2 doors, and says "honk honk"');
  }
}

