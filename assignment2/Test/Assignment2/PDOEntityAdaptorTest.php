<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOEntityAdaptorTest
  extends Assignment2TestCase {

  /**
   * Bad data provider.
   *
   */
  public function badPDOSchemaInterfaceObjects() {
    $data = array(
      array(NULL),
      array(array()),
      array(new \stdClass),
      array(0),
      array(TRUE),
      array(''),
    );
    return $data;
  }

  /**
   * testAddingBadEntities()
   *
   * @dataProvider badPDOSchemaInterfaceObjects
   */
  public function testAddingBadEntities($testEntity) {
    $adaptor = new PDOEntityAdaptor();
    try {
      $adaptor->setEntity($testEntity);
    } catch (\RuntimeException $e) {
      $this->assertTrue(TRUE);
      return;
    }
    $this->assertFalse(TRUE);
  }
  
  public function malformedSchema() {
    $data = array(
      array(array()),
      array(array('tablename' => array())),
    );
    return $data;
  }

  /**
   * testMalformedSchema()
   * @TODO: Come back to this.
   *
   * @dataProvider malformedSchema
   */
  public function t___estMalformedSchema($testSchema) {
    $entity = new MockPDOSchema($testSchema);
    $adaptor = new PDOEntityAdaptor();
    $adaptor->setEntity($entity);
    try {
      $schema = $adaptor->getEntityTable();
    } catch (\RuntimeException $e) {
      $this->assertTrue(TRUE);
      return;
    }
    $this->assertFalse(TRUE);
  }

}

