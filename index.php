<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login - OCES</title>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
    <link rel="shortcut icon" href="resources/images/oces.ico" />
  </head>

  <body>
  <!-- HEADING -->
  <div class="container-fluid" id="heading1">  
      <img src="resources/images/hau.png" id="hau_logo"/>
      <h1 class="text-center" id="full_oces_header">OCES RECORDS MANAGEMENT SYSTEM</h1>
      <h1 id="short_oces_header">OCES</h1>
  </div>
  <div id="heading2"></div>
  <div id="heading3"></div> 

  <!-- FORM -->
  <div class="container text-center" id="form_padding1">
      <form>
        <table cellpadding="4" style="margin-left: auto; margin-right: auto;">
          <tr>
            <td>USERNAME</td>
            <td><input type="text" placeholder=" username" style="border-radius: 5px"></td>
          </tr>
          <tr>
            <td>PASSWORD</td>
            <td><input type="password" placeholder=" password" style="border-radius: 5px"></td>
          </tr>
        </table>
      </form>
      <br>
      <button type="submit" class="btn" id="btn_login">LOGIN</button>
  </div>  

  </body>

  <!-- JAVASCRIPT -->
  <?php
      require 'partials/scripts.php';
  ?>
</html>