<?php
namespace Assignment2;
/**
 * @file
 * Testing our UserEntity class.
 */

class PDOAdaptorLiveDBTest
  extends Assignment2TestCase {

  public function dbConnection() {
    $data = array(
      array(
        array(
          'host' => 'localhost',
          'dbname' => 'assignment2',
          'username' => 'root',
          'password' => 'root',
          'port' => '8889',
        ),
      ),
    );
    return $data;
  }

  /**
   * @TODO: Figure out how to make this a special test case
   * @dataProvider dbConnection
   */
  public function t__estConnect($db) {
    $pdoa = new PDOAdaptor();
    $pdoa->setDatabase($db);
    $pdoa->connect();
    $this->assertTrue(TRUE);
  }

}

