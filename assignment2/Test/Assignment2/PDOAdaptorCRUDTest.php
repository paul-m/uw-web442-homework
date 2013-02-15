<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOAdaptorCRUDTest
  extends Assignment2DBTestCase {

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
  public function getDataSet() {
//    return new \PHPUnit_Extensions_Database_DataSet_DefaultDataSet(array());
    return $this->createXMLDataSet(dirname(__FILE__).'/fixtures/User-db.xml');
  }

/*  public function setUp() {
    // Why is this enough????
    //$pdo = $this->getConnection();//->getConnection();
  }
*/  

  public function t__estSelect() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
//    print_r($this->getPDO());
    $adaptor->connect($this->getPDO());
    $stuff = $adaptor->select('firstname', 'paul');
    //$stuff = reset($stuff);
//    var_dump($stuff);
    $this->assertEquals($stuff['id'], 1);
    $this->assertEquals($stuff['firstname'], 'paul');
    $this->assertEquals($stuff['lastname'], 'mitchum');
  }

  public function testDelete() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $this->assertEquals(1, $this->getConnection()->getRowCount($tableName));
    $adaptor->connect($this->getPDO());
    $stuff = $adaptor->delete(1);
    $this->assertEquals(0, $this->getConnection()->getRowCount($tableName));
  }


}

