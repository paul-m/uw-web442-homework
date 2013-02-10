<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOAdaptorTest
  extends Assignment2TestCase {

  public function testConstruct() {
    $pdoa = new PDOAdaptor();
    $this->assertTrue(TRUE);
  }

}

