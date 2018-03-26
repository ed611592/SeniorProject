<?php  

require_once(__DIR__ . '/vendor/autoload.php');

use MCordingley\Regression\Observations;
use MCordingley\Regression\Observation;
use MCordingley\Regression\Algorithm\LeastSquares;

use MCordingley\Regression\Predictor\Linear as LinearPredictor;
use MCordingley\Regression\StatisticsGatherer\Linear as LinearStatisticsGatherer;

use MCordingley\Regression\Tests\LeastSquaresFeatures;


$observations = new Observations;
//******NEED TO HAVE AT LEAST ONE MORE OBSERVATION THAN FEATURE
//this is each student's answers to questions
$features = [
        [1, 2, 3, 1],
        [1, 1, 2, 3],
        [1, 3, 3, 3],
        [1, 4, 2, 2],
        [1, 3, 4, 2]
    ];
//this is each student's grade
$outcomes = [
        80,
        90,
        50,
        85,
        75
    ];

$observations = Observations::fromArray($features, $outcomes);   


$regression = new LeastSquares;
$coefficients = $regression->regress(Observations::fromArray($features, $outcomes));

//print_r($coefficients);

//$coefficients2 = [1.0954970633022, 0.92451598868827];
$predictor = new LinearPredictor($coefficients);


$statisticsGatherer = new LinearStatisticsGatherer(
            $observations,
            $coefficients,
            $predictor
        );

print(round($statisticsGatherer->getFStatistic(), 3) . " ");
$tStatistics = $statisticsGatherer->getTStatistics();
print(round($tStatistics[0], 2) . " ");
print(round($tStatistics[1], 2) . " ");
print(round($tStatistics[2], 2) . " ");
print(round($tStatistics[3], 2) . " ");




?>