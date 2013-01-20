<?php
namespace Util;

/**
 * String Utility object
 */
class StringUtil
{
    /**
     * empty array, empty string, false and null as empty.
     * Any other values will be false
     *
     * @param mixed $value
     * @return bool
     */
    public static function isNullOrEmpty( $value ) {
        if( NULL === $value )
            return true;

        if( FALSE === $value) {
            return true;
        }

        if( "" === $value) {
            return true;
        }

        if( is_array($value) && count($value) === 0) {
            return true;
        }

        return false;
    }
}

