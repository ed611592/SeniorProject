<br><br><br><h2>Create an account</h2>


<?php echo validation_errors(); ?>

<?php echo form_open('teacher/register'); ?>
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

	<button type = "submit" class = "btn btn-primary btn-block">Submit</button>

<?php echo form_close(); ?>