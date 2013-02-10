<?php
namespace Assignment2;

/**
 * @file
 * A PDO adaptor class.
 */

class MockPDOAdaptor implements PDOAdaptorInterface {

  protected $_entity;

  /**
   * database function.
   *
   * We just ignore the DB config info in this mock object.
   * 
   * @access public
   * @param array $databaseConfigArray (default: array())
   * @return void
   */
  public function setDatabase($databaseConfigArray = array()) {
    return;
  }
  
  public function setEntity($pdoSchemaEntity = NULL) {
    $this->_entity = $pdoSchemaEntity;
  }

  public function connect() {
    return TRUE;
  }

  public function disconnect() {
    return TRUE;
  }

  public function select($column = '', $value = '') {
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

