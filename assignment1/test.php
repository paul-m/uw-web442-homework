<?php

/**
 * @file
 * Do something with the classes we created.
 */

require_once('Car.php');
require_once('Civic.php');
require_once('Truck.php');

$vehicles = array();

$vehicles[] = new Truck();
$vehicles[] = new Car();
$vehicles[] = new Civic();
$vehicles[] = new Civic(2015, 7);

foreach ($vehicles as $v) {
  echo '<div>' . $v->describe() . '</div>';
}

