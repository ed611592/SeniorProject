<center><h2><?= $title; ?></h2></center>
</br>

<?php echo validation_errors(); ?>

<!-- Main Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/mainCss.css" rel="stylesheet">
<!-- User Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/registrationCss.css" rel="stylesheet">




<?php 
	$id = $this -> session -> get_userdata();
	//echo $id['teach_ID'];
?>

<?php echo form_open('Student/register'); ?>

<div class="container">
	<div class = "row">
		<div class = 'col-md-4 col-md-offset-4'>
			<input type="hidden" class = "form-control" name = "teach_ID" value= "<?php echo htmlspecialchars($id['teach_ID']) ?>" />

			<div class = "form-group">
				<label>Student's First Name</label>
				<input type = "text" class = "form-control" name = "fname" placeholder = "First Name">
			</div>

			<div class = "form-group">
				<label>Student's Last Name</label>
				<input type = "text" class = "form-control" name = "lname" placeholder = "Last Name">
			</div>

			<div class = "form-group">
				<label>Student's Username</label>
				<input type = "text" class = "form-control" name = "username" placeholder = "Username">
			</div>

			<div class = "form-group">
				<label>Student's Password</label>
				<input type = "password" class = "form-control" name = "password" placeholder = "Password">
			</div>

			<div class = "form-group">
				<label>Confirm Student's Password</label>
				<input type = "password" class = "form-control" name = "password2" placeholder = "Confirm Password">
			</div>

			<div class = "form-group">
				<label>Student's Average Grade</label>
				<input type = "number" class = "form-control" name = "AVG_Grade" placeholder = "Average Grade">
			</div>
		</div>
	</div>
	</br>
	<center>
		<button type = "submit" class = "btn btn-primary btn-block">Submit</button>
	</center>

</div>
<?php echo form_close(); ?>