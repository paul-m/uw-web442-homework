<?php
namespace Assignment2;

/**
 * @file
 * User entity class.
 */

class TestEntity implements PDOSchemaInterface {

  public function getPDOAdaptorSchema() {
    return array(
      'User' => array(
        'id' => array(
          'type' => \PDO::PARAM_INT,
        ),
        'firstname' => array(
          'type' => \PDO::PARAM_STR,
          'size' => 255,
        ),
        'lastname' => array(
          'type' => \PDO::PARAM_STR,
          'size' => 255,
        ),
      ),
    );
  }

}

