<?php 

echo 'hi'; 


require_once(__DIR__ . '/vendor/autoload.php');

//this library works
use MathPHP\Algebra;


// Greatest common divisor (GCD)

$gcd = Algebra::gcd(8, 12);



use MCordingley\Regression\Observations;

$observations = new Observations;

$data = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );

//so it will go through the array data, and loop through each array and refer to it as $datum
foreach ($data as $datum) {
    // Note addition of a constant for the first feature.
    //$datum-> features means we have to get the feature of that specific array?
    $observations->add(array_merge([1.0], $datum->features), $datum->outcome);
}

use MCordingley\Regression\Algorithm\LeastSquares;
$algorithm = new LeastSquares;

?>