

<title>Student Login</title>


<!-- Student Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/UserCss.css" rel="stylesheet">

<!-- Sign-In Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/signInCss.css" rel="stylesheet">

<body>
  <center>
  <div  class = "chip">
    <img  src="<?php echo base_url();?>assets/images/ChipStudent.png">
    <h3> Chip The Pet Detective</h3>
  </div>

  <?php echo form_open('student/login'); ?>
    <div class = "row">
      <div class = "form-signin">
        <h2 class = "form-signin-heading"><?php echo $title; ?></h2>


        <div class = "form-signin">
          <input type = "text" name = "username" class = "form-control" placeholder = "Username" required autofocus>
        </div>

        <div class = "form-signin">
          <input type = "password" name = "password" class = "form-control" placeholder = "Password" required autofocus>
        </div>

        <button type = "submit" class = "btn btn-lg btn-primary btn-block">Sign in</button>

      </div>
    </div>
  <?php echo form_close(); ?>
  </center>
</body>



 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 
</html>