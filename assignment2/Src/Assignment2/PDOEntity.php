<?php
namespace Assignment2;

/**
 * @file
 * User entity class.
 */

class PDOEntity {

  protected $_data;

  public function __get($name) {
    $table = $this->getPDOAdaptorSchema();
    $keyz = array_keys($table);
    $tableName = reset($keyz);
    $schema = $table[$tableName];
    if (isset($schema[$name])) {
      if (isset($this->_data[$name])) {
        return $this->_data[$name];
      }
    }
    throw new \RuntimeException('Unknown key.');
  }

  public function __set($name, $value) {
    $table = $this->getPDOAdaptorSchema();
    $keyz = array_keys($table);
    $tableName = reset($keyz);
    $schema = $table[$tableName];
    if (isset($schema[$name])) {
      // @TODO: check for type.
      $this->_data[$name] = $value;
      return;
    }
    throw new \RuntimeException('Unknown key.');
  }

}

