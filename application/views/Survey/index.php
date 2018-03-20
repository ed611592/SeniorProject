

<?php
$counter =1;
if(!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
    
}

// if button is pressed, increment counter
if(isset($_POST['button'])) {
    ++$_SESSION['counter'];
    ++$counter;
}    

// reset counter
if(isset($_POST['reset'])) {
    $_SESSION['counter'] = 0;
}

$id = $this -> session -> get_userdata();



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
<link href="<?php echo base_url();?>assets/css/userCss.css" rel="stylesheet">
<!-- Css for Survey -->
<link href="<?php echo base_url();?>assets/css/surveyCss.css" rel="stylesheet">

<?php 
$data = $this -> session -> get_userdata();


// here we select every column of the table
$q = $this->db->get('Question');

$data = $q->result_array();

//echo($data[$_SESSION['counter']]['Q_text']);

?>

<!--<?php echo form_open('Survey/add_response'); ?> -->

<div class="container">
  <form method="POST">
      <input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>"/>
      <h3 id = "story"> <?php echo($data[$_SESSION['counter']]['story']); ?></h3>
      <h3 id = "question"> <?php echo($data[$_SESSION['counter']]['Q_text']); ?></h3>

      <img id = "chip" src = "<?php echo base_url();?>assets/images/ChipStudent.png">

    <div id= "answer">
      <div>
        <input type="radio" name="Student_Answer" id="option1" value="1" />
        <label for="option1"><?php echo($data[$_SESSION['counter']]['option1']); ?> </label>
      </div>

      <div>
        <input type="radio" name="Student_Answer" id="option2" value="2" />
        <label for="option1"><?php echo($data[$_SESSION['counter']]['option2']); ?> </label>
      </div>

      <div>
        <input type="radio" name="Student_Answer" id="option3" value="3" />
        <label for="option1"><?php echo($data[$_SESSION['counter']]['option3']); ?> </label>
      </div>

      <div>
        <input type="radio" name="Student_Answer" id="option4" value="4" />
        <label for="option1"><?php echo($data[$_SESSION['counter']]['option4']); ?> </label>
      </div>
    </div>


      <input type="hidden" class = "form-control" name = "Q_ID" value= "<?php echo($data[$_SESSION['counter']]['Q_ID']); ?>" />

      <input type="hidden" class = "form-control" name = "Surv_ID" value= "<?php echo($data[$_SESSION['counter']]['Surv_ID']); ?>" />

      <input type="hidden" class = "form-control" name = "S_ID" value= "<?php echo htmlspecialchars($id['S_ID']) ?>" />



      <div id = buttons>

        <input type="submit" name="button" value="Next" class = "btn red btn-lg btn-primary btn-block"/>
        <input type="submit" name="reset" value="Reset" class = "btn btn-lg btn-primary btn-block"/>

      </div>
   
  </form>
 </div>
<!--<?php echo form_close(); ?> -->

