<?php
namespace Lab4;

/**
 * @file
 * Front controller main page.
 */

// Include the database array from settings.php.
include 'settings.php';

function echo_div($msg = '') {
  echo '<div>' . $msg . '</div>';
}

function connect_db($db_creds = array()) {
  $connectString = 'mysql:host=' . $db_creds['host'] . ';dbname=' . $db_creds['dbname'];
  $pdo = new \PDO($connectString, $db_creds['username'], $db_creds['password']);
  return $pdo;
}

/** 
 * Function create_table().
 *
 * Only create the table if it doesn't exist.
 *
 * For this lab, we're making this table:

  CREATE TABLE `User` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `firstname` varchar(255) DEFAULT NULL,
    `lastname` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB
 
 */
function create_table($pdo) {
  // Figure out if the table exists.
  $query = 'SELECT 1 from User';
  $tableExists = $pdo->query($query);
  
  if ($tableExists) return TRUE;

  $query = 'CREATE TABLE `User` ( `id` int(11) NOT NULL AUTO_INCREMENT, `firstname` varchar(255) DEFAULT NULL, `lastname` varchar(255) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB';
  $tableExists = $pdo->query($query);

  if ($tableExists) return TRUE;
  return FALSE;
}

// Global storage for our PDO object.
$pdo = NULL;
try {
  $pdo = connect_db($database);
} catch (\Exception $e) {
  echo_div('Problem: ' . get_class($e) . ' says: ' . $e->getMessage());
  exit(1);
}

if (create_table($pdo)) {
  // Insert a new row into the table
  echo_div('created table or it existed already.');
  $insert_these = array();
/*  for ($i=0; $i < 10; ++$i) {
    
  }*/
}
else {
  echo_div('unable to create table in database.');
}
