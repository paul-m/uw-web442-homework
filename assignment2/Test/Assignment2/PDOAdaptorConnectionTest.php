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
    return $this->createXMLDataSet(dirname(__FILE__).'/fixtures/User-db.xml');
  }

  public function setUp() {
    // Why is this enough????
    $pdo = $this->getConnection();//->getConnection();
  }
  
  /**
   * @expectedException \RuntimeException
   */
  public function testBadConnection() {
    $pdoa = new PDOAdaptor();
    $pdoa->connect();
  }
  
/*  public function testGoodPDOConnection() {
    $pdoa = new PDOAdaptor();
    $pdoa->setEntity(new TestEntity());
    $pdo = $this->getConnection()->getConnection();
    $pdoa->connect($pdo);
    $this->assertTrue(TRUE);    
  }*/

/*  public function testDisconnect() {
    $pdoa = new PDOAdaptor();
    $pdoa->setEntity(new TestEntity());
    $pdo = $this->getConnection()->getConnection();
    $pdoa->connect($pdo);
    $pdoa->disconnect();
    $this->assertTrue(TRUE);    
  }*/

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
  
  public function testGoodConnectionString() {
    $db = array(
      'driver' => 'driver',
      'dbname' => 'dbname',
      'host' => 'host',
      'port' => 'port',
    );
    // _pdoConnectionString is protected function, so we
    // make a mocky stub.
    $mock = new MockPDOAdaptorDB();
    $mock->setDatabase($db);
    //mysql:dbname=testdb;host=127.0.0.1
    $this->assertEquals($mock->getPDOConnectionStringForTest(),
      'driver:host=host;dbname=dbname');
  }
}

