<?php  

require_once(__DIR__ . '/vendor/autoload.php');

use MCordingley\Regression\Observations;
use MCordingley\Regression\Observation;
use MCordingley\Regression\Algorithm\LeastSquares;

$observations = new Observations;
//i think this is answers to the questions
$arraytest = array(1,2);
//y value aka grade in class?
$outcometest = 90.0;

$obs1 = new Observation($arraytest, $outcometest);
$obs2 = new Observation($arraytest, $outcometest);
$obs3 = new Observation($arraytest, $outcometest);
$obs4 = new Observation($arraytest, $outcometest);

$data = array
  (
  $obs1, $obs2, $obs3, $obs4
  );

//so it will go through the array data, and loop through each array and refer to it as $datum
foreach ($data as $datum) {
    // Note addition of a constant for the first feature.
    //$datum-> features means we have to get the feature of that specific array?
    $observations->add(array_merge([1.0], $datum->getFeatures()), $datum->getOutcome());
}

print_r($observations -> getFeatures());

$algorithm = new LeastSquares;
$coefficients = $algorithm->regress($observations);

?>