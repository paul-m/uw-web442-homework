<?php
/**
 * Abstract class to represent vehicle
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

    function __construct($modelYear = 0, $doors = 0) {
      $this->setYear($modelYear);
      $this->setNumberOfDoors($doors);
    }

    /**
     * Return the number of doors
     * @return int The number of doors
     */
    public function getNumberOfDoors() {
      return $this->_numberOfDoors;
    }
    
    public function setNumberOfDoors($doors = 0) {
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
    public function setYear($year = '0') {
      return $this->_year = $year;
    }

    /**
     * Return a textual description of the vehicle.
     * @return string
     */
    public function describe() {
      return 'This ' . get_class($this) .
      ' is from model year ' . $this->getYear() .
      ', has ' . $this->getNumberOfDoors() .
      ' doors, and says "' . $this->honk() . '"';
    }
}

