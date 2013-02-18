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
    $set = $this->createXMLDataSet(__DIR__.'/fixtures/User-db.xml');
    return $set;
  }

  public function te__stSelect() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());

    $record = $adaptor->select('id', 1);
    $record = reset($record);
    if (!empty($record)) {
      $this->assertEquals($record['id'], 1);
      $this->assertEquals($record['firstname'], 'paul');
      $this->assertEquals($record['lastname'], 'mitchum');
      return;
    }
    $this->assertTrue(FALSE, 'Unable to select a record');
  }

  public function te__stDelete() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());
    $beforeCount = $this->getConnection()->getRowCount($tableName);
    $adaptor->delete(1);
    $this->assertNotEquals($beforeCount, $this->getConnection()->getRowCount($tableName));
  }

  public function testInsert() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());
    $beforeCount = $this->getConnection()->getRowCount($tableName);
//    echo ' before: ' . $beforeCount;
    $stuff = $adaptor->insert(array('id'=>1, 'firstname' => 'jay', 'lastname'=> 'zeng'));
    $afterCount = $this->getConnection()->getRowCount($tableName);
  //  echo ' after: ' . $afterCount;
    $this->assertNotEquals($beforeCount, $afterCount);
  }

  /**
   * This test is radically incomplete.
   */
  public function testUpdate() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());
    // add a record.
//    $stuff = $adaptor->insert(array('firstname' => 'paul', 'lastname'=> 'mitchum'));
    $beforeCount = $this->getConnection()->getRowCount($tableName);
    // change the record.
    $stuff = $adaptor->update(array('id'=>1, 'firstname' => 'jay', 'lastname'=> 'zeng'));
    $afterCount = $this->getConnection()->getRowCount($tableName);
    $this->assertEquals($beforeCount, $this->getConnection()->getRowCount($tableName));
  }


}

