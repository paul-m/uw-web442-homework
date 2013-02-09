<?php

/**
 * @file
 * PDOSchemaInterface
 * Gives us a way for PDOAdaptorInterface objects to
 * understand the schema of an entity object.
 */

interface PDOSchemaInterface {
  /**
   * PDOAdaptorSchema().
   *
   * Returns an array describing the schema.
   *
   * array(
   *   ['tablename'] => array(
   *     ['columname'] => array(
   *       ['type'] => PDO::PARAM_*,
   *       ['size'] => number,
   *     ),
   *   ),
   *   etc...
   * )
   *
   */
  public function pdoAdaptorSchema();
}