<?php
namespace Assignment2;

/**
 * @file
 * A PDO adaptor class.
 */

class MockPDOAdaptorDB extends PDOAdaptor {

  public function getPDOConnectionStringForTest() {
    return $this->_pdoConnectionString();
  }

}

