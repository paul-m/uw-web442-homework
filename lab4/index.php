<?php
namespace Lab4;

/**
 * @file
 * Front controller main page.
 */

// Include the database array from settings.php.
include 'settings.php';

echo 'foo';

// Global storage for our mysqli object.
$mysqli = NULL;

$mysqli = new \mysqli($database['host'], $database['username'], $database['password'], $database['dbname']);
if ($mysqli->connect_error) {
  throw new \Exception('Connect Error (' . $mysqli->connect_errno . ') ' .
    $mysqli->connect_error);
}

echo 'woot.';
