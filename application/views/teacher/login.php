<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Teacher Login</title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

     <!-- Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

      <!-- Main Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/mainCss.css" rel="stylesheet">

    <!-- Student Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/studentCss.css" rel="stylesheet">

    <!-- Sign-In Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/signInCss.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body id = "teacherLogIn">
  <center>
          <div  class = "Logo">
           
              <img  src="<?php echo base_url();?>assets/images/ChipTeacher.png">
              <h3> Chip The Pet Detective</h3>
            
          </div>
  </center>  
  <?php echo form_open('teacher/login'); ?>

  	<center>
  	<div class = "row">
  		<div class = "form-signin">
  			<h2 class = "form-signin-heading"><?php echo $title; ?></h2></center>

  			<div class = "form-group">
  				<input type = "text" name = "username" class = "form-control" placeholder = "Username" required autofocus>
  			</div>

  			<div class = "form-group">
  				<input type = "password" name = "password" class = "form-control" placeholder = "Password" required autofocus>
  			</div>

  			 <center>
           		<div class="checkbox">
            		  <!--<label>
                			<input type="checkbox" value="remember-me"> Remember me
              		</label>-->
            		</div>

           	 <a type="text" href ="<?php echo base_url();?>teacher/register">Don't have an account? Create Username.</a>

  			<button type = "submit" class = "btn btn-lg btn-primary btn-block">Sign in</button>

          </center>



  		</div>
  	</div>
  	</center>
 </body>

<?php echo form_close(); ?>

 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 
</html>