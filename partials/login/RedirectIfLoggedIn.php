<?php
    //renamed php file to -> RedirectIfLoggedIn
    //todo: combine both redirecting scripts
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $pageName = end($link_array);  

  //pedeng navbar nalang ata icheck dito, sa index.php lang naman ata narrequire to
  if(isset($_SESSION['navbar']) && $pageName == "index.php")
  {
    //header("Location: http://".$_SERVER['HTTP_HOST']."/HomePage.php"); in case maselan yung shared hosting sa $_SERVER
      header("Location: views/Homepage.php" );
      exit();
  }
?>