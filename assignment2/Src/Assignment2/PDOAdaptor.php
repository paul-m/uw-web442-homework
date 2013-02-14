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
    $this->_databaseConfig = $databaseConfigArray;
  }

  protected function _pdoConnectionString() {
    $cred = $this->_databaseConfig;
    $driver = '';
    $host = '';
    $dbname = '';
    if (isset($cred['driver'])) { echo 'setting driver'; $driver = $cred['driver']; }
    if (isset($cred['host'])) $host = $cred['host'];
    if (isset($cred['dbname'])) $dbname = $cred['dbname'];
    if ('' == $driver) throw new \RuntimeException('no specified driver.');
    if ('' == $host) throw new \RuntimeException('no specified host.');
    if ('' == $dbname) throw new \RuntimeException('no specified database.');
    $pdoConnectionString = $driver .
      ':host=' . $host .
      ';dbname=' . $dbname;
    return $pdoConnectionString;
  }

  public function connect() {//\PDO $pdo = NULL) {
  $pdo = NULL;
    if (empty($pdo)) {
      // Grab the config.
      $connectionString = $this->_pdoConnectionString();
      echo "\n$connectionString\n";
      $cred = $this->_databaseConfig;
      if (!is_array($cred)) throw new \RuntimeException('No DB credentials.');
      // Some defaults.
      $username = '';
      $password = '';
      // Glean from the db config array.
      if (isset($cred['username'])) $username = $cred['username'];
      if (isset($cred['password'])) $password = $cred['password'];
      // New PDO object.
      try {
        echo 'new pdo';
        $pdo = new \PDO(
          $connectionString,
          $username,
          $password
        );
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\Exception $e) {
        throw new \RuntimeException('unable to connect because bad PDO.');
      }
    }
    $this->_pdo = $pdo;
    if (!$this->_pdo) throw new \RuntimeException('Unable to connect.');
  }

  public function disconnect() {
    $this->_pdo = NULL;
  }
  
  public function select($column = '', $value = '') {
    $table = $this->getEntityTable();
    $tableName = $this->getEntityTableName();
    $sql = 'SELECT * FROM :table WHERE :column = :value';
//    try {
      $statement = $this->_pdo->prepare($sql);
      $statement->bindValue(':table', $tableName, \PDO::PARAM_STR);
      $statement->bindValue(':column', $column, \PDO::PARAM_STR);
      $statement->bindValue(':value', $value, $table[$column]['type']);
//      $statement->debugDumpParams();
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
/*    } catch (\Exception $e) {
      throw new \RuntimeException('Attempting to SELECT without PDO object.');
    }
*/    return array();
  }

  public function insert($record) {
    $this->update($record, TRUE);
  }

  public function update($record, $insert = FALSE) {
    $result = NULL;
    $table = $this->getEntityTable();
    $tableName = $this->getEntityTableName();
    $sql = '';
    // INSERT special cases
    if ($insert) {
      // Unset the ID column
      unset($record['id']);
      $sql .= 'INSERT INTO ';
    }
    else {
      $sql .= 'UPDATE  ';
    }
    $sql = ':table SET ';
    
    $queryArray = array();
    // assemble basic ['columnname'] => value array
    foreach($table as $columnName) {
      if (isset($record[$columnName])) {
        $queryArray[$columnName] = $record[$columnName];
      }
    }
    $sqlArray = array();
    // structure the query
    foreach($queryArray as $columnName => $value) {
      $sqlArray .= ':c_' . $columnName . ' = :v_' . $columnName;
    }
    // Generate some SQL
    $sql .= implode(', ', $sqlArray);
    // Generate statement object.
    $statement = $this->_pdo->prepare($sql);
    // Bind values.
    $statement->bindValue(':table', $tableName);
    foreach($queryArray as $columnName => $value) {
      $statement->bindValue(':c_' . $columnName, $columnName);
      $statement->bindValue(':v_' . $columnName, $value);
    }
    // Do the query.
    return $statement->exec();
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

