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

  public function createTestTable(\PDO $pdo) {
    $pdo->query('DROP TABLE IF EXISTS User');
    $pdo->query('CREATE TABLE User (id INTEGER NOT NULL, firstname CHAR(255), lastname CHAR(255),PRIMARY KEY (id), UNIQUE (id))');
  }

}

