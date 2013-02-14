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
        $dsn = $GLOBALS['DB_DRIVER'] . ':' .
          'dbname=' . $GLOBALS['DB_DBNAME'] . ';' .
          'host=' . $GLOBALS['DB_HOST'];
        self::$pdo = new \PDO( $dsn, $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
      }
      $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
    }
    
    return $this->conn;
  }
}

