<?php
namespace Assignment2;

/**
 * @file
 * Testing our UserEntity class.
 */

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
        $this->randomName('f_', 255),
        $this->randomName('l_', 255),
      );
    }
    $data[] = array('first', 'last');
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
}

