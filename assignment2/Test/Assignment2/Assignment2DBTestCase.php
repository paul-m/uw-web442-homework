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
        //self::$pdo = new \PDO('sqlite::memory:');
        self::$pdo = new \PDO('sqlite:User.db');
      }
      $this->conn = $this->createDefaultDBConnection(self::$pdo, 'User');
    }
    return $this->conn;
  }
  
  final public function getPDO() {
    // load up the singletons....
    $conn = $this->getConnection();
    // ..and hand one back.
    //return self::$pdo;
    return $conn->getConnection();
  }

  public function setUp() {
    parent::setUp();
    $entity = new TestEntity();
    $entity->createTestTable(self::$pdo);
  }

  public function __destruct() {
    $this->conn = NULL;
    self::$pdo = NULL;
  }

}

