


<?php 
require_once(__DIR__ . '/vendor/autoload.php');


use MathPHP\Algebra;
use Regression\Algorithm\LeastSquares;
//$algorithm = new LeastSquares;
use Regression\src\Observations;
//use Regression\Predictor\Linear;

//$observations = new Observation;
// Greatest common divisor (GCD)
$gcd = Algebra::gcd(8, 12);
//echo $gcd;
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

    
  </center>


    