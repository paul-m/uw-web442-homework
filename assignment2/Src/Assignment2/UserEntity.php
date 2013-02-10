<?php
namespace Assignment2;

/**
 * @file
 * User entity class.
 */

class UserEntity implements PDOSchemaInterface {

  protected $_data;
  
  protected $_pdo;
  
  protected function getPDO() {
    $pdo = $this->_pdo;
    if ($pdo) return $pdo;
    $this->_pdo = new PDOAdaptor();
  }

  public function __get($name) {
    $table = $this->getPDOAdaptorSchema();
    $keyz = array_keys($table);
    $tableName = reset($keyz);
    $schema = $table[$tableName];
    if (isset($schema[$name])) {
      if (isset($this->_data[$name])) {
        return $this->_data[$name];
      }
      else {
        if (isset($this->_data[$name]['defaultValue'])) {
          return $this->_data[$name]['defaultValue'];
        }
        return NULL;
      }
    }
    throw new \RuntimeException('Unknown key.');
  }

  public function __set($name, $value) {
//  echo '--> ' . $name . ' = ' . $value;
    $table = $this->getPDOAdaptorSchema();
//    echo '  ';
    $keyz = array_keys($table);
    $tableName = reset($keyz);
//    echo $tabley;
    $schema = $table[$tableName];
//    var_dump($schema);
    if (isset($schema[$name])) {
      // @TODO: check for type.
      $this->_data[$name] = $value;
      return;
    }
    throw new \RuntimeException('Unknown key.');
  }

  public function getPDOAdaptorSchema() {
    return array(
      'User' => array(
        'id' => array(
          'type' => \PDO::PARAM_INT,
        ),
        'firstname' => array(
          'type' => \PDO::PARAM_STR,
          'size' => 255,
        ),
        'lastname' => array(
          'type' => \PDO::PARAM_STR,
          'size' => 255,
        ),
      ),
    );
  }

}

