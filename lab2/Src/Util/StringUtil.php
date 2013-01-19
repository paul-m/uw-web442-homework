<?php
namespace Util;

class StringUtil {
  /**
   * Is input string null or empty?
   * @param string $value Value to check.
   * @return boolean True if null or empty.
   */
  public static function isNullOrEmpty( $value = NULL ) {
    if (NULL === $value) return TRUE;
    if (gettype($value) != 'string') {
      throw new \InvalidArgumentException('StringUtil::isNullOrEmpty() requires a string argument. Or NULL.');
    }
    if (empty($value)) return TRUE;
    return FALSE;
  }
}

