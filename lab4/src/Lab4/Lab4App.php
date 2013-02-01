<?php

/**
 * @file
 * Main front controller app.
 */

class Lab4App {

  protected $db_creds;
  
  protected $mysqli;

  /**
   * Constructor function.
   */
  public function __construct($db_creds = array()) {
    // Error checking on db creds array.
    if (!is_array($db_creds)
      // insert other reasons here
      ) {
      //throw new DBCredsSuckException();
      throw new Exception();
    }
    else {
      $this->
    }
  }

}
