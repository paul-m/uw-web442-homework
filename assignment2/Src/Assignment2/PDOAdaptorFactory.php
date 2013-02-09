<?php
namespace Assignment2;

/**
 * @file
 * PDOAdaptorFactory class.
 * This static class acts like a singleton.
 *
 */

class PDOAdaptorFactory {
  static $_pdoAdaptor = NULL;

  /**
   * createPDOAdaptor()
   *
   * Returns a PDOAdaptorInterface object.
   */
  public static function createPDOAdaptor() {
    if (self::$_pdoAdaptor) return self::$_pdoAdaptor;
    // Really we'd use some yml or ini reader type thing,
    // but instead we'll pull in a PHP file from the
    // document root.
    try {
      include_once 'database.inc';
    } catch (Exception $e) {
      throw new \RuntimeException('No database.inc file found.');
    }
    if (isset($_database)) {
      self::$_pdoAdaptor = new PDOAdaptor($_database);
    }
    else {
      throw new \RuntimeException('Unable to configure the database.');
    }
    return self::$_pdoAdaptor;
  }
}

