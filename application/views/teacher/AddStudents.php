<br><br><br><center><h2>Create a student's account</h2></center>


<?php echo validation_errors(); ?>

 <!-- Main Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/mainCss.css" rel="stylesheet">
   




<?php echo form_open('teacher/view/AddStudents'); ?>

 <body id= "teacher">
	<div class = "row">
		<div class = 'col-md-4 col-md-offset-4'>
			<div class = "form-group">
				<label>Student's Name</label>
				<input type = "text" class = "form-control" name = "S_name" placeholder = "Name">
			</div>

			<div class = "form-group">
				<label>Student's Username</label>
				<input type = "text" class = "form-control" name = "S_username" placeholder = "Username">
			</div>

			<div class = "form-group">
				<label>Student's Password</label>
				<input type = "password" class = "form-control" name = "S_password" placeholder = "Password">
			</div>

			<div class = "form-group">
				<label>Confirm Student's Password</label>
				<input type = "password" class = "form-control" name = "S_password2" placeholder = "Confirm Password">
			</div>
		</div>
	</div>
	<center>
		<button type = "submit" class = "btn btn-primary btn-block">Submit</button>
	</center>

</body>
<?php echo form_close(); ?>