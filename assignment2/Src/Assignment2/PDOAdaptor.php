<?php
namespace Assignment2;

/**
 * @file
 * A PDO adaptor class.
 */

class PDOAdaptor extends PDOEntityAdaptor implements PDOAdaptorInterface {

  protected $_databaseConfig;
  protected $_pdo;
  
  public function setDatabase($databaseConfigArray) {
    $this->databaseConfig = $databaseConfigArray;
  }

  public function connect() {
    $this->_pdo = new \PDO('mysql:host=localhost;dbname=test');//, $user, $pass);
  }

  public function disconnect() {
    $this->_pdo = NULL;
  }

  public function select($column = '', $value = '') {
    $schema = $this->getEntityTable();
    if ($this->_pdo) {
      $sql = 'SELECT * FROM :table WHERE :column = ';
      if ($schema[$column]['type'] == \PDO::PARAM_STR) {
        $sql .= "':value'";
      }
      else {
        $sql .= ':value';
      }
      $statement = $this->_pdo->prepare($sql);
      $statement->execute(
        array(
          ':table' => $table,
          ':column' => $column,
          ':value' => $value,
        )
      );
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    return array();
  }

  public function insert($record) {
    $this->update($table, $record);
  }

  public function update($record) {
    $schema = $this->getEntityTable();
    // do some sql here.
  }

  public function delete($id) {
    $schema = $this->getEntityTable();
    // do some sql here.
  }

}

