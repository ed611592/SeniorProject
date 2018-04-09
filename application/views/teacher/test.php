
<!DOCTYPE html> 
  <head> 
  <title>Teacher Results</title> 
    <!--Load the AJAX API--> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <script type="text/javascript">


     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChart); 
    google.charts.setOnLoadCallback(drawChart2); 
       
    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Teacher/getdata' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 

      var jsonData2 = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Teacher/getdata2' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
      var data2 = new google.visualization.DataTable(jsonData2); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div')); 
      var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2')); 

      chart.draw(data, {width: 380, height: 250, title: 'Favorite Subject of Students' }); 

      chart2.draw(data2, {width: 380, height: 250, title: 'Least Favorite Subject of Students' }); 

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
    <h1>Results</h1> 
    <div id="chart_div"></div> 
    <div id="chart_div2"></div>


  </body> 
</html>
<br>



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
$bullied_array = array();
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

        $bullied = $this -> Teacher_model -> get_kids_bullied($id);
        

        //this figures out if a student is bullied
        if(!empty($bullied)){
            $bullied=$bullied[0];
            if(!($bullied['Student_Answer']==1)){
                array_push($bullied_array, $student);
            }

        }

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

//print($students_done . " ");
//print($students_total . " ");
$percent = round($students_done/$students_total, 3);
$percent = $percent*100;
//print("The percent of students that have taken the survey: " . $percent*100 . "% ");



  

//this is each student's answers to questions
/*
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
    */
$features = [
    [1,2,1,4,1,3,2,2,3,4,1,1,1,2,1,3],
    [4,1,1,2,2,1,1,1,1,3,1,2,3,1,1,1],
    [2,2,3,1,1,2,2,1,1,4,1,2,1,1,1,3],
    [2,1,2,4,1,1,2,1,1,3,1,1,1,1,1,1],
    [3,1,1,2,1,2,3,2,1,3,1,4,2,3,2,3],
    [2,1,3,2,2,3,1,1,1,4,1,4,3,3,2,3],
    [1,1,2,3,2,2,2,1,1,3,1,1,1,4,1,1],
    [1,1,2,4,1,2,2,1,1,4,1,1,1,3,1,4],
    [3,1,1,2,3,3,1,2,1,3,1,3,1,1,1,2],
    [2,1,2,1,3,2,2,2,1,4,2,2,3,2,2,4],
    [3,1,1,4,2,2,1,2,1,3,1,1,1,3,2,2],
    [4,2,3,2,2,3,2,2,1,4,2,4,3,2,2,4],
    [1,3,3,1,2,3,2,2,1,3,2,2,2,3,1,4],
    [2,1,1,2,1,3,1,1,1,3,1,2,2,2,2,3],
    [3,1,2,1,2,2,1,1,1,3,1,1,2,2,1,3],
    [4,2,2,1,1,3,3,3,1,4,3,2,2,2,3,4],
    [1,3,2,3,2,3,3,2,2,4,3,1,1,2,1,4],
    [2,1,3,1,2,3,1,2,1,3,2,3,2,1,1,3]
]; 

$outcomes = [
    90,
    65,
    70,
    95,
    68,
    70,
    96,
    92,
    95,
    80,
    88,
    73,
    75,
    78,
    84,
    87,
    90,
    82
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

//print("F-statistic: " . round($statisticsGatherer->getFStatistic(), 3) . " ");
$tStatistics = $statisticsGatherer->getTStatistics();


/*
print("Q1:  " . round($tStatistics[0], 2) . " ");
print("Q2:  " . round($tStatistics[1], 2) . " ");
print("Q3:  " . round($tStatistics[2], 2) . " ");
print("Q4:  " . round($tStatistics[3], 2) . " ");
print("Q5:  " . round($tStatistics[4], 2) . " ");
print("Q6:  " . round($tStatistics[5], 2) . " ");
print("Q7:  " . round($tStatistics[6], 2) . " ");
print("Q8:  " . round($tStatistics[7], 2) . " ");
print("Q9:  " . round($tStatistics[8], 2) . " ");
print("Q10:  " . round($tStatistics[9], 2) . " ");

print("Q11:  " . round($tStatistics[10], 2) . " ");
print("Q12:  " . round($tStatistics[11], 2) . " ");

print("Q13:  " . round($tStatistics[12], 2) . " ");
print("Q14:  " . round($tStatistics[13], 2) . " ");
print("Q15:  " . round($tStatistics[14], 2) . " ");
print("Q16:  " . round($tStatistics[15], 2) . " ");
*/





?>

<h3 id = "reg_title">These are the questions that are signficant for your class:</h3>
<div id = "reg_stats">
<?php
$stat_array=array();
for($i =0;$i<16;$i++){
    if(abs($tStatistics[$i])>=2){
        $x = $i+1;
        array_push($stat_array, $x);
        
    }
}

?>
</div>
<br>

 <link href="<?php echo base_url();?>/assets/css/resultsCSS.css" rel="stylesheet"> 
<h3 id = "parents">The number of students with one parent: <?php echo $s_one_parent ?></h3>
<h3 id = "percent">The percent of students that have taken the survey is: <?php echo $percent ?>%</h3>
<br>

<h2 id = "bullied_title" >Students that feel like they are getting bullied</h2>


<div >
                <table id ="TB" class="table">
                    <thead>
                        <tr> 
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bullied_array as $person) : ?>
                            
                            <tr>
                                <th scope="row"><?php echo $person['fname'] ?></th>
                                <td><?php echo $person['lname'] ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
<h3 id = "reg_nums"><?php for($i =0; $i<sizeof($stat_array); $i++){
        print("Q" . $stat_array[$i] . "  ");
} ?></h3>

