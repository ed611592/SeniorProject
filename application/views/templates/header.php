 <html lang = "en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">



  <!-- Latest compiled and minified CSS -->
  <!-- Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">




  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

  <!-- Fusion Charts -->
  


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <!-- Custom styles for this template -->
  <link href="/../Chip/assets/css/mainCss.css" rel="stylesheet">
</head>

<body>
  <nav class=" myNav navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class=" collapse navbar-collapse">
        <ul class="nav navbar-nav">
          
          <!-- if a student or teacher is not logged in -->
          <?php if(!$this -> session -> userdata('s_logged_in') && !$this -> session -> userdata('t_logged_in')): ?>
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>student/login">Student Login</a></li>
            <li><a href="<?php echo base_url();?>teacher/login">Teacher Login</a></li>
          <?php endif; ?>  
          <!-- if a student is logged in -->
          <?php if ($this -> session -> userdata('s_logged_in')): ?>

            <li class="active"><a href="<?php echo base_url();?>student/view/studenthome">Home</a></li>
            <li><a href = "<?php echo base_url();?>student/logout">Log Out</a></li>

          <?php endif; ?>    

          <!-- if a teacher is logged in -->
          <?php if ($this -> session -> userdata('t_logged_in')): ?>

            <li class="active"><a href="<?php echo base_url();?>teacher/view/teacherHome">Home</a></li>
            <li><a href = "<?php echo base_url();?>teacher/logout">Log Out</a></li>

          <?php endif; ?>  

        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
</body>


<!-- Flash messages -->
<?php if($this-> session-> flashdata('user_registered')): ?>

  <?php echo '<center><p class = "alert alert-success" style= "text-shadow: none; width: 200px">'.$this -> session -> flashdata('user_registered').'</p></center>'; ?>

<?php endif; ?> 

<?php if($this-> session-> flashdata('login_failed')): ?>

  <?php echo '<center><p class = "alert alert-danger" style= "text-shadow: none; width: 200px">'.$this -> session -> flashdata('login_failed').'</p></center>'; ?>

<?php endif; ?>  

<!--<?php if($this-> session-> flashdata('user_loggedin')): ?>
  
  <?php echo '<center><p class = "alert alert-success" style= "text-shadow: none; width: 200px">'.$this -> session -> flashdata('user_loggedin').'</p></center>'; ?>

<?php endif; ?> -->


<?php if($this-> session-> flashdata('user_loggedout')): ?>
  
  <?php echo '<center><p class = "alert alert-success" style= "text-shadow: none; width: 200px;">'.$this -> session -> flashdata('user_loggedout').'</p></center>'; ?>

<?php endif; ?>  