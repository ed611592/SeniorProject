<h2><?= $title ?></h2>

<?php
	$answer = array('' );

?>

<?php foreach ($survey as $question ) : ?>
	<h3 id = "question"> <?php echo $question['Q_text']; ?></h3>
            <div class="list-group">
              <a href="#!" class="list-group-item list-group-item-action"><?php echo $question['option1']; ?></a>
              <a href="#!" class="list-group-item list-group-item-action"><?php echo $question['option2']; ?></a>
              <a href="#!" class="list-group-item list-group-item-action"><?php echo $question['option3']; ?></a>
              <a href="#!" class="list-group-item list-group-item-action"><?php echo $question['option4']; ?></a>


<?php endforeach; ?>

