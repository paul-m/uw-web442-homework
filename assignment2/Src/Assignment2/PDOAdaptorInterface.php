<?php
namespace Assignment2;

/**
 * @file
 * PDOAdaptorInterface: Making promises to *you*!
 */

interface PDOAdaptorInterface {
  public function __construct($databaseConfigArray);
  public function connect();
  public function disconnect();
  public function select($table = '', $column = '', $value = '');
  public function insert($table, $record);
  public function update($table, $record);
  public function delete($table, $idArray);

// DELETE FROM `shop_categories` WHERE FIND_IN_SET(id, :id)"

}

