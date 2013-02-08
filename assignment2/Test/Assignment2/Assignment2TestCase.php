<?php
namespace Assignment2;

/**
 * @file
 * Some useful stuff to have around.
 */

class Assignment2TestCase extends \PHPUnit_Framework_TestCase {

  public function randomName($prefix = '', $length = 10) {
    $validChars = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $count = strlen($validChars);

    $randomName = $prefix;

    while (strlen($randomName) < $length) {
        $randomName .= $validChars[(mt_rand(1, $count))-1];
    }
    return $randomName;
  }

}

