
<?php 
require_once(__DIR__ . '/vendor/autoload.php');

/*//this library works
use MathPHP\Algebra;
use Regression\Algorithm\LeastSquares;
//$algorithm = new LeastSquares;
use Regression\src\Observations;
//use Regression\Predictor\Linear;

//$observations = new Observation;
// Greatest common divisor (GCD)

$gcd = Algebra::gcd(8, 12);

//this library does not work
<<<<<<< HEAD
use MCordingley\Regression\Observations;

$observations = new Observations;
=======
use MCordingley\Regression\Algorithm\LeastSquares;
//$algorithm = new LeastSquares;*/
>>>>>>> 46d51e60b702db17983df8c41f1a0e9c43151acc

$id = $this -> session -> get_userdata();
//echo $id['S_ID'];
?>

 <div class="home">
        <h1>Welcome To Chip's Adventure!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
  </div>
  <center>
    <img src = "assets/images/ChipHome.jpeg">
    <br>
    <br>
    <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>-->
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>student/login">Student</a>
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>teacher/login">Teacher</a>
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>studentHome">Student Home</a>
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>survey">Survey</a>

    
  </center>


    