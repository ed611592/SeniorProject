<h2><?= $title ?></h2>

<?php
	//$answer = array('');

//	if (isset($answer){
		//$this -> db -> 
//	}

?>

<?php 
	print_r($survey[0]);
?>


<?php foreach ($survey as $question ) : ?>
	<h3 id = "question"> <?php echo $question['Q_text']; ?></h3>
            <div class="list-group">
              <a href="response1" class="list-group-item list-group-item-action"><?php echo $question['option1']; ?></a>
              <a href="response2" class="list-group-item list-group-item-action"><?php echo $question['option2']; ?></a>
              <a href="response3" class="list-group-item list-group-item-action"><?php echo $question['option3']; ?></a>
              <a href="response4" class="list-group-item list-group-item-action"><?php echo $question['option4']; ?></a>
            </div>

<?php endforeach; ?>

