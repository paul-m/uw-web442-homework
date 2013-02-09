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
    $result = array()
    if ('User' == $table) {
      if ('id' == $column) {
        switch ((integer)$value) {
          case 1:
            $result[] = array('id' => 1, 'firstname' => 'Paul', 'lastname' => 'Mitchum',);
          case 2:
            $result[] = array('id' => 2, 'firstname' => 'Jay', 'lastname' => 'Zeng',);
        }
      }
    }
    return $result;
  }

  public function insert($table, $record) { return TRUE; }
  public function update($table, $record) { return TRUE; }
  public function delete($table, $idArray) { return TRUE; }
  
}

