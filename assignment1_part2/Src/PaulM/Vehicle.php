<?php
namespace PaulM;

/**
 * @file
 * Abstract class to represent vehicle
 */

/**
 * We create a new type of exception to throw for vehicles.
 */
class NonExistantVehicleException extends \Exception { }

/**
 * Our abstract Vehicle class.
 *
 * Will throw an exception if you don't override the constructor.
 */
abstract class Vehicle
{
  /**
   * Number of doors
   * @var int
   */
  protected $_numberOfDoors;
  
  /**
   * Model year of the vehicle.
   * @var int
   */
  protected $_year;
  
  /**
   * Constructor
   * @param int Model Year
   * @param int Doors
   */
  public function __construct($modelYear = -1, $doors = -1) {
    try {
      $this->setYear($modelYear);
      $this->setNumberOfDoors($doors);
    } catch (\InvalidArgumentException $e) {
      throw new NonExistantVehicleException('Bad constructor arguments.');
    }
    if (!is_int($modelYear) || !is_int($doors) ||
      ($this->getNumberOfDoors() < 0) || ($this->getYear() < 0)) {
      throw new NonExistantVehicleException('Vehicles must have a model year and doors.');
    }
    return $this;
  }

  /**
   * Return the number of doors
   * @return int The number of doors
   */
  public function getNumberOfDoors() {
    return $this->_numberOfDoors;
  }
  
  /**
   * Set the number of doors
   * @param int Number of doors
   * @return int The number of doors set
   */
  public function setNumberOfDoors($doors = 0) {
    if (!is_int($doors)) {
      throw new \InvalidArgumentException('Vehicle->setNumberOfDoors() requires an integer.');
    }
    return $this->_numberOfDoors = $doors;
  }
  
  /**
   * Return the model year
   * @return int The model year
   */
  public function getYear() {
    return $this->_year;
  }
  
  /**
   * Set the model year
   * @param int
   * @return int The model year just set
   */
  public function setYear($year = 0) {
    if (!is_int($year)) {
      throw new \InvalidArgumentException('Vehicle->setYear() requires an integer.');
    }
    return $this->_year = $year;
  }

  /**
   * Return a textual description of the vehicle.
   *
   * We have to do Reflection to see if we implement honk().
   *
   * @return string
   */
  public function describe() {
    $method = NULL;
    try {
      $method = new \ReflectionMethod(get_class($this), 'honk');
    } catch (\ReflectionException $e) {
    }
    $result = 'This (is another change) ' . get_class($this) .
    ' is from model year ' . $this->getYear() .
    ', has ' . $this->getNumberOfDoors() .
    ' doors, ';
    if ($method != NULL) {
      $result .= 'and says "' . $this->honk() . '"';
    } else {
      $result .= 'and does not implement honk().';
    }
    return $result;
  }
}

