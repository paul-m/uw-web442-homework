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
        array(),
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

  public function badDbConnection() {
    $data = array(
      array(
        array(
          'host' => 'very',
          'dbname' => 'very',
          'user' => 'wrong',
          'password' => 'wrong',
          'port' => '666',
        ),
        // empty array
        array(),
      ),
    );
    return $data;
  }

  /**
   * @dataProvider badDbConnection
   * @expectedException \RuntimeException
   */
  public function testBadConnect($db) {
    $pdoa = new PDOAdaptor();
    $pdoa->setDatabase($db);
    $pdoa->connect();
  }

}

