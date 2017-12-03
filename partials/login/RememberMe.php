<?php
  if(!empty($_POST["remember"])) 
  {
    setcookie ("member_login","");
    setcookie ("member_password","");

    setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
  } 
  else 
  {
    if(isset($_COOKIE["member_login"])) 
    {
      setcookie ("member_login","");
    }
    if(isset($_COOKIE["member_password"])) 
    {
      setcookie ("member_password","");
    }
  }   
?>