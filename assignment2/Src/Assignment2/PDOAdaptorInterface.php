<?php
namespace Assignment2;

/**
 * @file
 * PDOAdaptorInterface: Making promises to *you*!
 */

interface PDOAdaptorInterface {
  public function setDatabase($databaseConfigArray);

  public function setEntity($pdoSchemaEntity);

  public function connect();

  public function disconnect();

  public function select($column, $value);

  public function insert($record);

  public function update($record);

  public function delete($id);

}

