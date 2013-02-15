<?php
namespace Assignment2;

/**
 * @file
 * Testing our UserEntity class.
 */

class EntityGettersSettersTest
  extends Assignment2TestCase {

  /**
   * testUserCreation()
   * Test that nothing blows up when we create a TestEntity.
   */
  public function testUserCreation() {
    $entity = new TestEntity();
    $this->assertTrue(TRUE);
  }

  /**
   * @expectedException \RuntimeException
   */
  public function testGetNonexistantProperty() {
    $entity = new TestEntity();
    // nonexistantproperty is not defined in the schema.
    $value = $entity->nonexistantproperty;
  }

  /**
   * @expectedException \RuntimeException
   */
  public function testSetNonexistantProperty() {
    $entity = new TestEntity();
    // nonexistantproperty is not defined in the schema.
    $entity->nonexistantproperty = $this->randomName();
  }
  
  public function testGetWithSet() {
    $name = $this->randomName();
    $entity = new TestEntity();
    $entity->firstname = $name;
    $this->assertTrue($entity->firstname == $name);
  }

}

