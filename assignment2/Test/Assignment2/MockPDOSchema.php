<?php
namespace Assignment2;

class MockPDOSchema implements PDOSchemaInterface {

  public $_schema;

  public function __construct($schema = array()) {
    $this->_schema = $schema;
  }

  public function getPDOAdaptorSchema() {
    return $this->_schema;
  }

}

