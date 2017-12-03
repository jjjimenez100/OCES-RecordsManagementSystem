<?php
    require '../middleware/RoleMiddleware.php';
?>
<html lang="en">
  <head>
    <title>Welcome to OCES Records Management System</title>
    <!--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='temp/htdocs/htdocs/js/jquery-3.2.1.min.js'></script>
    <script src='temp/htdocs/htdocs/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
    <link rel="shortcut icon" href="resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
      <?php
        require '../partials/cssmetafiles.php';
      ?>
  </head>

  <body>
  <!-- HEADING -->
  <?php
      require '../partials/navigationbar.php';
  ?>   

  <!-- BODY TEXT -->    
    <div id= "welcome_home">
      <div id="content_home">
        <center>
            <div class="container-fluid">  
              <h3 class="display-4 text-center">
                Welcome to Office of the Community Extension Services <br> 
                <span id="rms"><b>RECORDS MANAGEMENT SYSTEM</b></span>
              </h3>
            </div>
        </center>        
      </div>  
    </div>

  </body>

  <!-- JAVASCRIPT -->
  <?php
      require '../partials/javascriptfiles.php';
  ?>
</html>