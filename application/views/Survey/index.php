

<?php

if(!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// if button is pressed, increment counter
if(isset($_POST['button'])) {
    ++$_SESSION['counter'];
}    

// reset counter
if(isset($_POST['reset'])) {
    $_SESSION['counter'] = 0;
}

?>

<?php echo "
  <script>
    function myFunction() {
      alert('Going home...');
      window.location.href='home'
    }  
  </script>"
?>

<!-- Css for all users -->
<link href="assets/css/userCss.css" rel="stylesheet">
<!-- Css for Survey -->
<link href="assets/css/surveyCss.css" rel="stylesheet">

<?php 
$data = $this -> session -> get_userdata();



?>

<?php echo form_open('Survey/add_response'); ?>

<form method="POST">
  <input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>"/>
  <h3 id = "question"> <?php echo $survey[$_SESSION['counter']]['Q_text']; ?></h3>

  <img id = "chip" src = "assets/images/ChipStudent.png">


    <div>
      <input type="radio" name="answer" id="option1" value="A" />
      <label for="option1"><?php echo $Survey[$_SESSION['counter']]['option1']; ?> </label>
    </div>

    <div>
      <input type="radio" name="answer" id="option2" value="B" />
      <label for="option1"><?php echo $survey[$_SESSION['counter']]['option2']; ?> </label>
    </div>

    <div>
      <input type="radio" name="answer" id="option3" value="C" />
      <label for="option1"><?php echo $survey[$_SESSION['counter']]['option3']; ?> </label>
    </div>

    <div>
      <input type="radio" name="answer" id="option4" value="D" />
      <label for="option1"><?php echo $survey[$_SESSION['counter']]['option4']; ?> </label>
    </div>

    <input type="hidden" class = "form-control" name = "Q_ID" value= "counter" />

    <input type="hidden" class = "form-control" name = "Surv_ID" value= "1" />

     <input type="hidden" class = "form-control" name = "S_ID" value= "1" />



  <div id = buttons>
    
      <input type="submit" name="button" value="Next" class = "btn red btn-lg btn-primary btn-block"/>
      <input type="submit" name="reset" value="Reset" class = "btn btn-lg btn-primary btn-block"/>
    
  </div>
</form>

<?php echo form_close(); ?>

