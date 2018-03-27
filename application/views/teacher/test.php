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
$features = array();
$outcomes = array();
$student_answers = array();
$students_total = 0;
$students_done = 0;
 foreach($students as $student){
    $id = $student['S_ID'];
    $students_total= $students_total +1;
    //gets all the answers for one student
    $answers = $this -> Teacher_model -> get_Answers($id);
    $get_grade = $this -> Teacher_model -> get_Grade($id);
    $grade_array = $get_grade[0];
    $grade = $grade_array['AVG_Grade'];
    
   // $grade = $AVG_grade['AVG_Grade'];
   

    foreach($answers as $ans){
       array_push($student_answers, $ans['Student_Answer']);
    }
    
    if(count($student_answers) > 0){
        $students_done = $students_done + 1;
        array_push($features, $student_answers); 
        array_push($outcomes, $grade);
    }
    
    
    unset($student_answers);
    $student_answers = array();


 }
print($students_done . " ");
print($students_total . " ");
$percent = round($students_done/$students_total, 3);
print("The percent of students that have taken the survey: " . $percent*100 . "% ");

  

//this is each student's answers to questions

$features = [
        [1, 2, 3, 1],
        [1, 1, 2, 3],
        [1, 3, 3, 3],
        [1, 4, 2, 2],
        [1, 3, 4, 2]
    ];
    
//this is each student's grade
   /*
$outcomes = [
        80,
        90,
        50,
        85,
        70
    ];
    */

 print_r($features);
 print($outcomes[0]);    

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