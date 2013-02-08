<?php
namespace Assignment2;

/**
 * @file
 * A PDO adaptor class.
 */

class MockPDOAdaptor implements PDOAdaptorInterface {

  /**
   * database function.
   *
   * We just ignore the DB config info in this mock object.
   * 
   * @access public
   * @param array $databaseConfigArray (default: array())
   * @return void
   */
  public function database($databaseConfigArray = array()) {
    return;
  }

  public function connect() {
    return TRUE;
  }

  public function disconnect() {
    return TRUE;
  }

  public function select($table = '', $column = '', $value = '') {
    return FALSE;
  }

  public function update() {
    return FALSE;
  }

  public function delete() {
    return FALSE;
  }

  public function insert() {
    return FALSE;
  }
  
}

