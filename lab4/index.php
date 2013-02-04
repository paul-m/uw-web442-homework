<?php
namespace Lab4;

/**
 * @file
 * Front controller main page.
 */

// Include the database array from settings.php.
include 'settings.php';

// Global storage for our PDO object.
$pdo = NULL;

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

  // Doesn't exist yet so we'll create it.
  $query = 'CREATE TABLE `User` ( `id` int(11) NOT NULL AUTO_INCREMENT, `firstname` varchar(255) DEFAULT NULL, `lastname` varchar(255) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB';
  $tableExists = $pdo->query($query);

  if ($tableExists) return TRUE;
  return FALSE;
}

function insert_row($pdo, $firstname = '', $lastname = '') {
  // Set up our query.
  $query = $pdo->prepare("INSERT INTO User (`firstname`, `lastname`) VALUES (:first, :last)");

  // Bind the paramaters
  $query->bindParam(':first', $firstname, \PDO::PARAM_STR, 255);
  $query->bindParam(':last', $lastname, \PDO::PARAM_STR, 255);
  
  $query->execute();
}

function get_last_row($pdo) {
  $query = $pdo->prepare("SELECT * FROM User WHERE `id` = (SELECT MAX(id) FROM User)");
  $query->execute();
  return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function all_records($pdo) {
  $query = $pdo->prepare("SELECT * FROM User");
  $query->execute();
  return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function table_array($title = '', $data = array()) {
  $keys = array('id', 'firstname', 'lastname');
  if (count($data) < 1) {
    echo '<div>No tabular data to display.</div>';
    return;
  }
  // Set up the table wrapper elements.
  echo '<table border="1"><caption>' . $title . '</caption>';
  echo '<tr>';
  foreach ($keys as $key) {
    echo '<th>' . $key . '</th>';
  }
  echo '</tr>';
  // Show the data itself.
  foreach($data as $datum) {
    echo '<tr>';
    foreach($keys as $key) {
      echo '<td>' . $datum[$key] . '</td>';
    }
    echo '</tr>';
  }
  // Close up the table.
  echo '</table>';
}


// main() {

// Try to connect to the DB.
try {
  $pdo = connect_db($database);
} catch (\Exception $e) {
  echo_div('Problem: ' . get_class($e) . ' says: ' . $e->getMessage());
  exit(1);
}

// Try to create the table.
if (create_table($pdo)) {
  // Insert a new row into the table
  insert_row($pdo, 'Jay', 'Zeng');
  insert_row($pdo, 'Paul', 'Mitchum');
  // Get last row inserted
  $last_insert = get_last_row($pdo);
  table_array('Last inserted record', $last_insert);
  // Get all records
  $all_records = all_records($pdo);
  table_array('All records', $all_records);
}
else {
  echo_div('unable to find or create table in database.');
}
