<?php

namespace Util;

class StringUtilTest extends \PHPUnit_Framework_TestCase {

  public function testStringUtilNull() {
    $this->assertTrue(StringUtil::isNullOrEmpty(NULL));
  }

  public function testStringUtilEmpty() {
    $this->assertTrue(StringUtil::isNullOrEmpty(''));
  }

  public function testStringUtilNotEmpty() {
    $this->assertFalse(StringUtil::isNullOrEmpty('abc'));
  }

  public function testStringUtilNumericInvalidArgument() {
    $this->setExpectedException('InvalidArgumentException');
    $result = StringUtil::isNullOrEmpty(1243);
  }

  public function testStringUtilArrayInvalidArgument() {
    $this->setExpectedException('InvalidArgumentException');
    $result = StringUtil::isNullOrEmpty(array());
  }

}

