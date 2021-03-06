<?php $student = $this -> session -> get_userdata(); ?>

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

    <title>Student Homepage</title>

    <!-- Latest compiled and minified CSS -->
    <!-- Core CSS -->
   

 

    <!-- Student Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/userCss.css" rel="stylesheet">

    <!-- Student Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/studentHome.css" rel="stylesheet">



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    

    <div class="container">

      <!--Animations-->
    
    
    <!---->
      <div id ="topSpace">

        <div id="chipPic"></div>
      	
        <div id="chip2"></div>
        <div class="home">
      		<h1>Hello <?php echo htmlspecialchars($student['username']) ?></h1>
      		<p class="lead">Let's start an adventure! </p>      	
        </div>


      </div>

        

      <div id ="chipStory">
        <img id = "chip" src = "<?php echo base_url();?>assets/images/ChipStudent.png">

        <center>
         <p> Hi! My name is Chip the Chipmunk. I am in second grade at Woodland elementary. In my free time, I like to help my friends solve mysteries! Do you think you could help me out?
         </p>
        </center>
      </div>
      <div id="stories">
        <center>
          <h4> Click here to start an investigation:</h4>
          <div class="list-group">
            <a href="<?php echo base_url();?>survey/takeSurvey" class="list-group-item list-group-item-action">The Case of the Missing Nuts</a>
            <!--<a href="#!" class="list-group-item list-group-item-action disabled">Story 2</a>
            <a href="#!" class="list-group-item list-group-item-action disabled">Story 3</a-->
          </div>
        </center>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
