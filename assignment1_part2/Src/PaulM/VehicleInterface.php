<?php
namespace PaulM;

/**
 * @file
 * Vehicles should implement this interface if they want to honk.
 */

interface VehicleInterface {
  /**
   * honk function.
   *
   * Gives vehicles a way to honk.
   * 
   * @access public
   * @return void
   */
  function honk();
}

