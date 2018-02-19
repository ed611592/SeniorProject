<br><br><br><center><h2>Create an account</h2></center>


<?php echo validation_errors(); ?>

 <!-- Main Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/mainCss.css" rel="stylesheet">



<?php echo form_open('teacher/register'); ?>

 <body id= teacherLogIn>
	<div class = "row">
		<div class = 'col-md-4 col-md-offset-4'>
			<div class = "form-group">
				<label>Name</label>
				<input type = "text" class = "form-control" name = "name" placeholder = "Name">
			</div>

			<div class = "form-group">
				<label>Username</label>
				<input type = "text" class = "form-control" name = "username" placeholder = "Username">
			</div>

			<div class = "form-group">
				<label>Password</label>
				<input type = "password" class = "form-control" name = "password" placeholder = "Password">
			</div>

			<div class = "form-group">
				<label>Confirm Password</label>
				<input type = "password" class = "form-control" name = "password2" placeholder = "Confirm Password">
			</div>
		</div>
	</div>
	<center>
		<button type = "submit" class = "btn btn-primary btn-block">Submit</button>
	</center>

</body>
<?php echo form_close(); ?>