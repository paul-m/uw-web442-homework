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
    $set = $this->createXMLDataSet(__DIR__.'/fixtures/User-db.xml');
//    echo implode($set->getTableNames(), ', ');
    return $set;
  }

  public function testSelect() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());
    
    // Can't get the fixture to work, so I'll insert some test data.
    $adaptor->insert(array('id'=>1, 'firstname' => 'paul', 'lastname'=> 'mitchum'));

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

  public function t__estDelete() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    $tableName = $adaptor->getEntityTableName();

    $adaptor->connect($this->getPDO());

    // Can't get the fixture to work, so I'll insert some test data.
    $adaptor->insert(array('id'=>1, 'firstname' => 'paul', 'lastname'=> 'mitchum'));
    
    // Make sure there's a record.
    $queryTable = $this->getConnection()->createQueryTable($tableName, "SELECT * FROM $tableName");
    // Grab the first row so we can know its ID value.
    $record = $queryTable->getRow(0);

    $beforeCount = $this->getConnection()->getRowCount($tableName);
    $adaptor->delete((integer)$record['id']);
    $this->assertNotEquals($beforeCount, $this->getConnection()->getRowCount($tableName));
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
    $stuff = $adaptor->insert(array('id'=>1, 'firstname' => 'paul', 'lastname'=> 'mitchum'));
    $beforeCount = $this->getConnection()->getRowCount($tableName);
    // change the record.
    $stuff = $adaptor->update(array('id'=>1, 'firstname' => 'jay', 'lastname'=> 'zeng'));
    $afterCount = $this->getConnection()->getRowCount($tableName);
    $this->assertEquals($beforeCount, $this->getConnection()->getRowCount($tableName));
  }


}

