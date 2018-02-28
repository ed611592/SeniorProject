

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

<?php echo form_open('Survey/add_response'); ?>

<form method="POST">
  <input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>"/>
  <h3 id = "question"> <?php echo $survey[$_SESSION['counter']]['Q_text']; ?></h3>

  <img id = "chip" src = "assets/images/ChipStudent.png">

  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action" id ="option1" name="option1"><?php echo $survey[$_SESSION['counter']]['option1']; ?></a>
    <a href="#" class="list-group-item list-group-item-action" id = "option2" name="option2"><?php echo $survey[$_SESSION['counter']]['option2']; ?></a>
    <a href="#" class="list-group-item list-group-item-action" id = "option3" name= "option3"><?php echo $survey[$_SESSION['counter']]['option3']; ?></a>
    <a href="#" class="list-group-item list-group-item-action" id = "option4" name = "option4"><?php echo $survey[$_SESSION['counter']]['option4']; ?></a>
  </div>

  <div id = buttons>
    
      <input type="submit" name="button" value="Next" class = "btn red btn-lg btn-primary btn-block"/>
      <input type="submit" name="reset" value="Reset" class = "btn btn-lg btn-primary btn-block"/>
    
  </div>
</form>

<?php echo form_close(); ?>

