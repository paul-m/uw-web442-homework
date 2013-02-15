<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOAdaptorConnectionTest
  extends Assignment2DBTestCase {

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
  public function getDataSet() {
    return new \PHPUnit_Extensions_Database_DataSet_DefaultDataSet(array());
//    return $this->createXMLDataSet(dirname(__FILE__).'/fixtures/User-db.xml');
  }

  public function setUp() {
    // Why is this enough????
    //$pdo = $this->getConnection();//->getConnection();
  }
  
  /**
   * @expectedException \RuntimeException
   */
  public function testBadConnection() {
    $pdoa = new PDOAdaptor();
    $pdoa->connect();
  }
  
  public function testGoodPDOConnection() {
    $pdoa = new PDOAdaptor();
    $pdoa->setEntity(new TestEntity());
    $pdo = $this->getConnection()->getConnection();
    $pdoa->connect($pdo);
    $this->assertTrue(TRUE);    
  }

  public function testDisconnect() {
    $pdoa = new PDOAdaptor();
    $pdoa->setEntity(new TestEntity());
    $pdo = $this->getConnection()->getConnection();
    $pdoa->connect($pdo);
    $pdoa->disconnect();
    $this->assertTrue(TRUE);    
  }

  public function dbConnection() {
    $data = array(
      array(
        array(
          // Globals set by phpunit.xml
          'driver' => $GLOBALS['DB_DRIVER'],
          'dbname' => $GLOBALS['DB_DBNAME'],
          'host' => $GLOBALS['DB_HOST'],
          'username' => $GLOBALS['DB_USER'],
          'password' => $GLOBALS['DB_PASSWD'],
          'port' => $GLOBALS['DB_PORT'],
        ),
      ),
    );
    return $data;
  }

  /**
   * @dataProvider dbConnection
   */
  public function testGoodArrayConnection($db) {
    $pdoa = new PDOAdaptor();
    $pdoa->setDatabase($db);
    $pdoa->setEntity(new TestEntity());
    $pdoa->connect();
    $this->assertTrue(TRUE);    
  }
  
  public function testConnectionString() {
    $db = array(
      'driver' => 'driver',
      'dbname' => 'dbname',
      'host' => 'host',
      'port' => 'port',
    );
    // _pdoConnectionString is protected function, so we
    // use a mock.
    $mock = new MockPDOAdaptorDB();
    $mock->setDatabase($db);
    // first with the port...
    $this->assertEquals($mock->getPDOConnectionStringForTest(),
      'driver:host=host:port;dbname=dbname');
    // remove the port.
    unset($db['port']);
    $mock->setDatabase($db);
    $this->assertEquals($mock->getPDOConnectionStringForTest(),
      'driver:host=host;dbname=dbname');
    }
}

