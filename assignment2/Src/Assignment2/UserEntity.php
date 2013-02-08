<?php
namespace Assignment2;

/**
 * @file
 * User entity class.
 */

class UserEntity {

  protected $_pdoAdaptor;

  protected $firstname;
  protected $lastname;

  public function __construct($pdoAdaptor = NULL) {
    if (!$pdoAdaptor) {
      $pdoAdaptor = new MockPDOAdaptor();
    }
    $this->_pdoAdaptor = $pdoAdaptor;
  }

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

