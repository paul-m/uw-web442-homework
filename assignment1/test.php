<?php

/**
 * @file
 * Do something with the classes we created.
 */

// Gather all our classes
require_once('Truck.php');
require_once('Car.php');
require_once('Civic.php');

// An array for all the vehicles we instantiate
$vehicles = array();

// Start instantiating vehicles.
try {
  $vehicle = new Truck();
  $vehicles[] = $vehicle;
} catch (NonExistantVehicleException $e) {
  echo '<div>Could not instantiate a Truck.</div>';
}

try {
  $vehicle = new Car();
  $vehicles[] = $vehicle;
} catch (NonExistantVehicleException $e) {
  echo '<div>Could not instantiate a Car.</div>';
}

try {
  $vehicle = new Civic();
  $vehicles[] = $vehicle;
} catch (NonExistantVehicleException $e) {
  echo '<div>Could not instantiate a Civic.</div>';
}

try {
  $vehicle = new Civic(2015, 7);
  $vehicles[] = $vehicle;
} catch (NonExistantVehicleException $e) {
  echo '<div>Could not instantiate a Civic with arguments.</div>';
}

// Tell the user about the instances.
foreach ($vehicles as $v) {
  echo '<div>' . $v->describe() . '</div>';
}

