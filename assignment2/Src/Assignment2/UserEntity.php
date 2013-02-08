<?php
namespace Assignment2;

/**
 * @file
 * Connect class to abstract some PDO.
 */

class UserEntity {
  protected $firstname;
  protected $lastname;

  public function getFirstname() {
    return $this->firstname;
  }
  public function getLastname() {
    return $this->lastname;
  }
  
  public function setFirstname($fname) {
    $this->firstname = $fname;
  }
  public function setLastname($lname) {
    $this->lastname = $lname;
  }
}

