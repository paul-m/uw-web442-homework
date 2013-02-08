<?php
namespace Assignment2;

/**
 * @file
 * Testing our UserEntity class.
 */

define('Assignment2\FIRSTNAME_MAX_LENGTH', 255);
define('Assignment2\LASTNAME_MAX_LENGTH', 255);

class UserTest
  extends Assignment2TestCase {

  /**
   * testUserCreation()
   * Test that nothing blows up when we create a UserEntity.
   */
  public function testUserCreation() {
    $user = new UserEntity();
    $this->assertTrue(TRUE);
  }

  /**
   * legalNamesDataProvider()
   * Provide legal names for testing.
   */
  public function legalNamesDataProvider() {
    $data = array();
    // arbitrarily 10 names.
    for ($i=0; $i<10; $i++) {
      $data[] = array(
        $this->randomName('f_', FIRSTNAME_MAX_LENGTH),
        $this->randomName('l_', LASTNAME_MAX_LENGTH),
      );
    }
    $data[] = array('first', 'last');
    return $data;
  }

  /**
   * illegalNamesDataProvider()
   * Provide edge case string names.
   */
  public function illegalNamesDataProvider() {
    $data = array();
    $data[] = array(
      $this->randomName('f_', FIRSTNAME_MAX_LENGTH + 1),
      $this->randomName('l_', LASTNAME_MAX_LENGTH + 1),
    );
    $data[] = array('', '');
    return $data;
  }

  /**
   * testUserGoodGettersSetters()
   * Test that all our getters and setters work with good data.
   *
   * @dataProvider legalNamesDataProvider
   */
  public function testUserGoodGettersSetters($firstn, $lastn) {
    $user = new UserEntity();
    $user->setFirstname($firstn);
    $this->assertTrue($user->getFirstname() == $firstn);
    $user->setLastname($lastn);
    $this->assertTrue($user->getLastname() == $lastn);
  }

  /**
   * testUserGoodGettersSetters()
   * Test that all our getters and setters complain about bad data.
   * @TODO: Set this to fail when the code happens.
   *
   * @dataProvider illegalNamesDataProvider
   */
  public function testUserBadGettersSetters($firstn, $lastn) {
    $user = new UserEntity();
    $user->setFirstname($firstn);
    $this->assertTrue($user->getFirstname() == $firstn);
    $user->setLastname($lastn);
    $this->assertTrue($user->getLastname() == $lastn);
  }

}

