


<?php 
require_once(__DIR__ . '/vendor/autoload.php');

use MathPHP\Algebra;

// Greatest common divisor (GCD)
$gcd = Algebra::gcd(8, 12);
//echo $gcd;
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
        <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>student"student">Student</a>
        <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>teacher/login">Teacher</a>

        
      </center>


    