<?php
namespace Assignment2;

/**
 * @file
 * A PDO adaptor class.
 */

class PDOAdaptor implements PDOAdaptorInterface {
  protected $_databaseConfig;
  protected $_pdo;
  protected $_entity; // is a PDOSchemaInterface object.
  
  public function setDatabase($databaseConfigArray) {
    $this->databaseConfig = $databaseConfigArray;
  }

  public function setEntity($pdoSchemaEntity) {
    $this->_entity = $pdoSchemaEntity;
  }

  public function connect() {
    $this->_pdo = new \PDO('mysql:host=localhost;dbname=test');//, $user, $pass);
  }

  public function disconnect() {
    $this->_pdo = NULL;
  }

  public function select($table = '', $column = '', $value = '') {
    if (!$this->_entity) {
      throw new \RuntimeException('No entity set for PDO adaptor.');
    }
    $schema = $this->_entity->pdoAdaptorSchema();
    if (!$schema ||
      !isset($schema[$table]) ||
      !isset($schema[$table][$column])) {
      throw new \RuntimeException('No schema model available to PDO adaptor.');
    }
    if ($this->_pdo) {
      $sql = 'SELECT * FROM :table WHERE :column = ';
      if ($schema[$table][$column]['type'] == \PDO::PARAM_STR) {
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

  public function insert($table, $record) {
    $this->update($table, $record);
  }

  public function update($table, $record) {
    
  }


  public function delete($table, $id) {}

}

