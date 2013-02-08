<?php
namespace Assignment2;

/**
 * @file
 * PDOAdaptorInterface: Making promises to *you*!
 */

interface PDOAdaptorInterface {
  public function database($databaseConfigArray = array());
  public function connect();
  public function disconnect();
  public function select($table = '', $column = '', $value = '');
  public function update();
  public function delete();
  public function insert();
}

