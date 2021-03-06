<?php 
  session_start();

  require dirname(__FILE__).'/../../config/DatabaseConnection.php';
  require 'RedirectIfLoggedIn.php';

  $HAU_EMAIL = "@hau.edu.ph" ;
  if(isset($_POST['login']))
  {
      //12/2/17 10:25 updated mysql -> to mysqli ;
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $password = hash("md5", $password);

    $stmt = $connect->prepare("SELECT * FROM `tbluser` WHERE `Username` = ? AND `Password` = ?");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result = $stmt->get_result();
    $userdata = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['username'] = $username;

    if($userdata['Username'] == $username && $userdata['Password'] == $password)
    {     
      require 'RememberMe.php';
        $_SESSION['navbar'] = $userdata['Position_Level'];
        $_SESSION['fullname'] = $userdata['First_Name'] .' '. $userdata['Middle_Name'] .' '. $userdata['Last_Name'];
        $_SESSION['userid'] = $userdata['UserID'];
      header("Location: views/HomePage.php");
    }      

    else
    {
      echo "<script src='resources/js/jquery-3.2.1.min.js'></script>
              <script type='text/javascript'>
                $(document).ready(function()
                {
                  $('#modalIncorrect').modal('show');
                });
              </script>";
    }
  }
?>