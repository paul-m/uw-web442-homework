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
    $this->_pdoAdaptor = PDOAdaptorFactory::createPDOAdaptor();
  }

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

}

