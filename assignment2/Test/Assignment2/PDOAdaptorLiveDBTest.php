<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOAdaptorLiveDBTest
  extends Assignment2DBTestCase {

  public function dbConnection() {
    $data = array(
      array(
        array(
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
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
  public function getDataSet() {
    return $this->createXMLDataSet(dirname(__FILE__).'/fixtures/User-db.xml');
  }
  
  /**
   * @expectedException \RuntimeException
   */
  public function testBadConnection() {
    $pdoa = new PDOAdaptor();
    $pdoa->connect();
  }
  
  public function testGoodConnection() {
    $pdoa = new PDOAdaptor();
    $pdoa->setEntity(new EntityTest());
    $pdo = $this->getConnection()->getConnection();
    $pdoa->connect($pdo);
    $this->assertTrue(TRUE);    
  }
  
  public function t__estSelect() {
    $pdoa = new PDOAdaptor();
    $pdoa->setEntity(new EntityTest());
    $pdo = $this->getConnection()->getConnection();
    $pdoa->connect($pdo);
    $pdoa->select('id', 1);
    $this->assertTrue(TRUE);
  }

  /**
   * @TODO: Figure out how to make this a special test case
   * @dataProvider dbConnection
   */
  public function t__estConnect($db) {
    $pdoa = new PDOAdaptor();
    $pdoa->setDatabase($db);
    $pdoa->connect();
    $this->assertTrue(TRUE);
  }

}

