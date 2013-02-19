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
      // Generate a PDO object if we need it.
      if (self::$pdo == null) {
        self::$pdo = new \PDO('sqlite::memory:');
      }
      // Add the User table.
      $entity = new TestEntity();
      $entity->createTestTable(self::$pdo);
      // Generate the fixture.
      $this->conn = $this->createDefaultDBConnection(self::$pdo, 'User');
    }
    return $this->conn;
  }
  
  final public function getPDO() {
    // load up the singletons....
    $conn = $this->getConnection();
    // ..and hand one back.
    // Yes, the PHPUnit_Extensions_Database_DB_IDatabaseConnection
    // has the same method name.
    return $conn->getConnection();
  }

  public function __destruct() {
    $this->conn = NULL;
    self::$pdo = NULL;
  }

}

