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
    // Grab the config.
    $cred = $this->_databaseConfig;
    if (!is_array($cred)) throw new \RuntimeException('No DB credentials.');
    // Some defaults.
    $driver = 'mysql';
    $host = 'localhost';
    $dbname = 'test';
    $username = '';
    $password = '';
    // Glean from the db config array.
    if (isset($cred['driver'])) $driver = $cred['driver'];
    if (isset($cred['host'])) $host = $cred['host'];
    if (isset($cred['dbname'])) $dbname = $cred['dbname'];
    if (isset($cred['username'])) $username = $cred['username'];
    if (isset($cred['password'])) $password = $cred['password'];
    // New PDO object.
    $pdo = new \PDO(
      $driver .
      ':host=' . $host .
      ';dbname=' . $dbname,
      $username,
      $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->_pdo = $pdo;
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

  public function loadByIds($idArray = array()) {
    
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

//  protected function validate(

}

