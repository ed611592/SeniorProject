


<!DOCTYPE html> 
  <head> 
  <title>Google Chart and Codeigniter with MySQL</title> 
    <!--Load the AJAX API--> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <script type="text/javascript"> 
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChart); 
       
    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Teacher/getdata' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 400, height: 300, title: 'Fruits', color: 'Green' }); 
    } 
 
    </script> 
<style> 
h1 { 
    text-align: center; 
} 
</style> 
  </head> 
 
  <body> 
    <!--Div that will hold the pie chart--> 
    <h1>Quantity of fruits we have in our store - Displayed by Google Chart and Codeigniter with MySQL</h1> 
    <div id="chart_div"></div> 

   
  </body> 
</html>
<?php  
$current_teacher = $this -> session -> get_userdata(); 
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
$s_one_parent = 0;

 foreach($students as $student){
    $id = $student['S_ID'];
    $student_teacher = $student['teach_ID'];

    $cur_teachID= $current_teacher['teach_ID'];

    if($student_teacher == $cur_teachID){
        //starts a running total of all the teacher's students
         $students_total= $students_total +1;

        //gets all the answers for one student
        $answers = $this -> Teacher_model -> get_Answers($id);
        //gets the the grades for one student
        $get_grade = $this -> Teacher_model -> get_Grade($id);

        //changes it from array to just grade
        $grade_array = $get_grade[0];
        $grade = $grade_array['AVG_Grade'];
        
      
        foreach($answers as $ans){
           array_push($student_answers, $ans['Student_Answer']);
        }
        
        if(count($student_answers) > 0){
            $students_done = $students_done + 1;
            array_push($features, $student_answers); 
            array_push($outcomes, $grade);
        }
        

        //to calculate if a student has a parent
        $check_parent = $this -> Teacher_model -> get_Question(2, $id);
       
        if ($check_parent['Student_Answer'] == 3 || $check_parent['Student_Answer'] == 4 ){
            $s_one_parent++;
        }

        unset($student_answers);
        $student_answers = array();
    }
   


 }


print("number of students with one parent: " . $s_one_parent . " ");


//print($students_done . " ");
//print($students_total . " ");
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
   
$outcomes = [
        80,
        90,
        50,
        85,
        70
    ];
    

// print_r($features);
 //print($outcomes[0]);    

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
/*
print(round($statisticsGatherer->getFStatistic(), 3) . " ");
$tStatistics = $statisticsGatherer->getTStatistics();
print(round($tStatistics[0], 2) . " ");
print(round($tStatistics[1], 2) . " ");
print(round($tStatistics[2], 2) . " ");
print(round($tStatistics[3], 2) . " ");
*/



?>