

<?php 
require_once(__DIR__ . '/vendor/autoload.php');


$id = $this -> session -> get_userdata();
//echo $id['S_ID'];
?>

 <div class="home">
        <h1>Welcome To Chip's Adventure!</h1>
  </div>
  <center>
    <img id="chip" src = "assets/images/ChipHome.jpeg">
    <br>
    <br>
    <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>-->
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>student/login">Student</a>
    <a class="btn btn-lg btn-primary btn-block" type="submit" href="<?php echo base_url();?>teacher/login">Teacher</a>

    
  </center>


    