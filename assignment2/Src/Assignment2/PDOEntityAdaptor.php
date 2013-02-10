<?php
namespace Assignment2;

/**
 * @file
 * A PDO adaptor class.
 */

class PDOEntityAdaptor {
  protected $_entity; // is a PDOSchemaInterface object.

  public function setEntity($pdoSchemaEntity) {
    if (!is_a($pdoSchemaEntity, 'PDOSchemaInterface')) {
      $this->_entity = NULL;
      throw new \RuntimeException('PDOAdaptorEntity needs a PDOSchemaInterface object.');
    }
    $this->_entity = $pdoSchemaEntity;
  }

  protected function getEntityTable() {
    if (!$this->_entity) {
      throw new \RuntimeException('No entity set for PDO Adaptor.');
    }
    try {
    $schema = $this->_entity->getPDOAdaptorSchema();
    } catch (Exception $e) {
      throw new \RuntimeException('PDO Adaptor entity does not support schema.');
    }
    $table = reset(array_keys($schema));
    if (empty($table)) {
      throw new \RuntimeException('PDO Adaptor schema has no tables set.');
    }
    return $schema[$table];
  }

}

