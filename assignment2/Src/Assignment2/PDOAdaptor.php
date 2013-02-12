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
  
  public function setDatabase(array $databaseConfigArray) {
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
    $table = $this->getEntityTable();
    $tableName = $this->getEntityTableName();
    $sql = 'SELECT * FROM :table WHERE :column = ';
    if ($schema[$column]['type'] == \PDO::PARAM_STR) {
      $sql .= "':value'";
    }
    else {
      $sql .= ':value';
    }
    try {
      $statement = $this->_pdo->prepare($sql);
      $statement->bindParam(':table', $tableName, PDO::PARAM_STR);
      $statement->bindParam(':column', $column, PDO::PARAM_STR);
      $statement->bindParam(':value', $value, $table[$column]['type']);
      $statement->exec();
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
      throw new \RuntimeException('Attempting to SELECT without PDO object.');
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
    $result = NULL;
    $table = $this->getEntityTable();
    $tableName = $this->getEntityTableName();
    $sql = 'DELETE FROM :table WHERE id=:id';
    try {
      $statement = $this->_pdo->prepare($sql);
      $statement->bindParam(':table', $tableName, PDO::PARAM_STR);
      $statement->bindParam(':id', $value, $table['id']['type']);
      $result = $statement->exec();
    } catch (\Exception $e) {
      throw new \RuntimeException('Unable to delete.');
    }
    return $result;
  }

  public function setEntity(PDOSchemaInterface $pdoSchemaEntity) {
    $this->_entity = $pdoSchemaEntity;
  }

  public function getEntitySchema() {
    if (!$this->_entity) {
      throw new \RuntimeException('No entity set for PDO Adaptor.');
    }
    try {
    $schema = $this->_entity->getPDOAdaptorSchema();
    } catch (Exception $e) {
      throw new \RuntimeException('PDO Adaptor entity does not support schema.');
    }
    return $schema;
  }

  public function getEntityTableName() {
    $schema = $this->getEntitySchema();
    $keyz = array_keys($schema);
    $table = reset($keyz);
    if (empty($table)) {
      throw new \RuntimeException('PDO Adaptor schema has no tables set.');
    }
    return $table;
  }

  public function getEntityTable() {
    $tableName = $this->getEntityTableName();
    $schema = $this->getEntitySchema();
    return $schema[$tableName];
  }

}

