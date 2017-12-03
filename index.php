<?php   
  require 'partials/login/Login.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login - OCES</title>
      <!-- di ko tinanggal to kase naka seperate na folder lahat ng views maliban sa index.php. -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="resources/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
      <link rel="shortcut icon" href="resources/images/oces.ico" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>

    
  <body>
  <!-- HEADING -->
  <div style="position: fixed; width: 100%;">
    <div class="container-fluid" id="heading1">  
      <img src="resources/images/hau.png" id="hau_logo"/>
      <h1 class="text-center" id="full_oces_header">OCES RECORDS MANAGEMENT SYSTEM</h1>
      <h1 id="short_oces_header">OCES</h1>
    </div>
    <div id="heading2"></div>
    <div id="heading3"></div> 
  </div>  

  <!-- FORM -->
  <div id="welcome_home">
    <div id="content_home">
      <div class="container" id="form_padding1">
        <center>
          <form id="myform" method="post">
            <table cellpadding="4">
              <tr>
                <td>USERNAME</td>
                <td><input name="username" type="text" placeholder=" username" required
                    value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';
                    if(isset($_COOKIE["member_login"])) 
                    { 
                      echo $_COOKIE["member_login"]; 
                    } 
                    ?>" />
                </td>
              </tr>
              <tr>
                <td>PASSWORD</td>
                <td><input name="password" type="password" placeholder=" password" required
                    value="<?php echo isset($_POST['password']) ? $_POST['password'] : '';
                    if(isset($_COOKIE["member_password"])) 
                    { 
                      echo $_COOKIE["member_password"]; 
                    } 
                    ?>" />
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                <input type="checkbox" name="remember" id="remember" 
                    <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                <label for="remember-me">Remember me</label>
                </td>
              </tr>  
            </table>      
          <br>
          <button name="login" type="submit" data-toggle="modal" data-target="modalNotBlank" class="btn" id="btn_login">LOGIN</button>
          </form>
        </center>
      </div>  
    </div>
  </div>    

  <?php
    require 'partials/modals/modal_script.php';
  ?>
  </body>

  <!-- SCRIPTS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src='resources/js/jquery-3.2.1.min.js'></script>
  <script src='resources/js/bootstrap.min.js'></script>

</html>