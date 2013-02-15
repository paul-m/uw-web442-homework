<?php
namespace Assignment2;

/**
 * @file
 * User entity class.
 */

class TestEntity extends PDOEntity implements PDOSchemaInterface {

  public function getPDOAdaptorSchema() {
    return array(
      'User' => array(
        'id' => array(
          'type' => \PDO::PARAM_INT,
          'defaultValue' => NULL,
        ),
        'firstname' => array(
          'type' => \PDO::PARAM_STR,
          'size' => 255,
          'defaultValue' => 'test_firstname',
        ),
        'lastname' => array(
          'type' => \PDO::PARAM_STR,
          'size' => 255,
          'defaultValue' => 'test_lastname',
        ),
      ),
    );
  }

}

