<?php
namespace Assignment2;

/**
* @file
* Some useful stuff to have in the namespace.
*/

abstract class Assignment2DBTestCase extends \PHPUnit_Extensions_Database_TestCase
{
  // only instantiate pdo once for test clean-up/fixture load
  static private $pdo = null;
  
  // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
  private $conn = null;
  
  final public function getConnection() {
    if ($this->conn === null) {
      if (self::$pdo == null) {
        self::$pdo = new \PDO('sqlite::memory:');
      }
      $this->conn = $this->createDefaultDBConnection(self::$pdo, ':memory:');
    }
    return $this->conn;
  }

  public function setUp() {
    $tableNames = array('User');
    $conn = $this->conn;
    if($conn) {
      $dataSet = $conn->getConnection()->createDataSet($tableNames);
    }
  }

}

