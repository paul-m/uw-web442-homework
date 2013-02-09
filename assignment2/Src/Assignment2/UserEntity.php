<?php
namespace Assignment2;

/**
 * @file
 * User entity class.
 */

class UserEntity implements PDOSchemaInterface {

  protected $firstname;
  protected $lastname;

  public function getFirstname() {
    return $this->firstname;
  }
  public function getLastname() {
    return $this->lastname;
  }
  public function getID() {
    return $this->id;
  }
  
  public function setFirstname($fname) {
    $this->firstname = $fname;
  }
  public function setLastname($lname) {
    $this->lastname = $lname;
  }
  public function setID($id) {
    $this->id = $id;
  }

  public function PDOAdaptorSchema() {
    return array(
      ['User'] => array(
        ['id'] => array(
          ['type'] => \PDO::PARAM_INT,
        ),
        ['firstname'] => array(
          ['type'] => \PDO::PARAM_STR,
          ['size'] => 255,
        ),
        ['lastname'] => array(
          ['type'] => \PDO::PARAM_STR,
          ['size'] => 255,
        ),
      ),
    );
  }

}

