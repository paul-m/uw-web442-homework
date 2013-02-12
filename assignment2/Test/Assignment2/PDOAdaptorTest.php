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
    $emptyArray = array();
    $data = [
      $emptyArray,
//      array('tablename' => array()),
    ];
    return $data;
  }

  /**
   * testMalformedSchema()
   * @TODO: Come back to this.
   *
   * @dataProvider malformedSchema
   */
  public function t___estMalformedSchema($malformedSchema) {
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

}

