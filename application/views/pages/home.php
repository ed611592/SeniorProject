


<?php 
require_once(__DIR__ . '/vendor/autoload.php');

//this library works
use MathPHP\Algebra;
$gcd = Algebra::gcd(8, 12);

//this library does not work
use MCordingley\Regression\Algorithm\LeastSquares;
//$algorithm = new LeastSquares;

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
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>StudentSurvey">Student Survey</a>

    
  </center>


    