<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOAdaptorTest
  extends Assignment2TestCase {

  public function testConstruct() {
    $pdoa = new PDOAdaptor();
    $this->assertTrue(TRUE);
  }
  
  public function malformedSchema() {
    $data = array(
      array(
        // empty array
        array(),
        // table name only
        array('tablename' => array()),
      ),
    );
    return $data;
  }

  /**
   * testMalformedSchema()
   *
   * @dataProvider malformedSchema
   */
  public function testMalformedSchema(array $malformedSchema) {
    $entity = new MockPDOSchema($malformedSchema);
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    try {
      $schema = $adaptor->getEntityTable();
    } catch (\RuntimeException $e) {
      $this->assertTrue(TRUE);
      return;
    }
    $this->assertFalse(TRUE);
  }
  
  public function testEntityAdaptorProvider() {
    $entity = new TestEntity();
    $adaptor = new PDOAdaptor();
    $adaptor->setEntity($entity);
    return array(array($adaptor));
  }
  
  /**
   * @dataProvider testEntityAdaptorProvider
   */
  public function testGetEntityTable(PDOAdaptor $adaptor) {
    $table = NULL;
    try {
      $table = $adaptor->getEntityTable();
    } catch (\Exception $e) {
      $this->assertTrue(FALSE);
      return;
    }
    $this->assertArrayHasKey('id', $table);
    $this->assertArrayHasKey('firstname', $table);
    $this->assertArrayHasKey('lastname', $table);
  }

  /**
   * @dataProvider testEntityAdaptorProvider
   */
  public function testGetEntityTableName(PDOAdaptor $adaptor) {
    $tableName = NULL;
    try {
      $tableName = $adaptor->getEntityTableName();
    } catch (\Exception $e) {
      $this->assertTrue(FALSE);
      return;
    }
    $this->assertEquals($tableName, 'User');
  }

  /**
   * @dataProvider testEntityAdaptorProvider
   */
  public function testGetEntitySchema(PDOAdaptor $adaptor) {
    $schema = NULL;
    try {
      $schema = $adaptor->getEntitySchema();
    } catch (\Exception $e) {
      $this->assertTrue(FALSE);
      return;
    }
    $this->assertArrayHasKey('User', $schema);
  }

  /**
   * @dataProvider testEntityAdaptorProvider
   * @expectedException \RuntimeException
   */
  public function testBadGetEntitySchema() {
    $adaptor = new PDOAdaptor();
    $schema = NULL;
    $schema = $adaptor->getEntitySchema();
  }


}

