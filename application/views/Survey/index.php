

<?php
	//$answer = array('');

//	if (isset($answer){
		//$this -> db -> 
//	}

?>

<?php 
	//print_r($survey[0]);
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

<?php foreach ($survey as $question ) : ?>
	<h3 id = "question"> <?php echo $question['Q_text']; ?></h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action" id ="option1" onclick=" return myFunction()"><?php echo $question['option1']; ?></a>
              <a href="#" class="list-group-item list-group-item-action" id = "option2" onclick=" return myFunction()"><?php echo $question['option2']; ?></a>
              <a href="#" class="list-group-item list-group-item-action" id = "option3" onclick=" return myFunction()"><?php echo $question['option3']; ?></a>
              <a href="#" class="list-group-item list-group-item-action" id = "option4" onclick=" return myFunction()"><?php echo $question['option4']; ?></a>
            </div>

<?php endforeach; ?>

