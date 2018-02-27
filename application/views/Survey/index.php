

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

 <link href="assets/css/UserCss.css" rel="stylesheet">

<form method="POST">
	<input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>"/>
	<h3 id = "question"> <?php echo $survey[$_SESSION['counter']]['Q_text']; ?></h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action" id ="option1" onclick=" return myFunction()"><?php echo $survey[$_SESSION['counter']]['option1']; ?></a>
              <a href="#" class="list-group-item list-group-item-action" id = "option2" onclick=" return myFunction()"><?php echo $survey[$_SESSION['counter']]['option2']; ?></a>
              <a href="#" class="list-group-item list-group-item-action" id = "option3" onclick=" return myFunction()"><?php echo $survey[$_SESSION['counter']]['option3']; ?></a>
              <a href="#" class="list-group-item list-group-item-action" id = "option4" onclick=" return myFunction()"><?php echo $survey[$_SESSION['counter']]['option4']; ?></a>
            </div>
        <input type="submit" name="button" value="Next" />
        <input type="submit" name="reset" value="Reset" />
    </form>

