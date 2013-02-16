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

  public function t__estDelete() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());
    $this->assertEquals(1, $this->getConnection()->getRowCount($tableName));
    $stuff = $adaptor->delete(1);
    $this->assertEquals(0, $this->getConnection()->getRowCount($tableName));
  }

  public function testInsert() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());
    $beforeCount = $this->getConnection()->getRowCount($tableName);
    $stuff = $adaptor->insert(array('id'=>1, 'firstname' => 'jay', 'lastname'=> 'zeng'));
    $this->assertNotEquals($beforeCount, $this->getConnection()->getRowCount($tableName));
  }


}

