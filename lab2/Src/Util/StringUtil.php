<?php

/**
 * Is input string null or empty?
 * @param string $value
 * @return boolean
 */
public static function isNullOrEmpty( $value ) {
  if (isset($value) && (NULL != $value)) {
    return TRUE;
  }
  return FALSE;
}

