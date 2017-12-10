<?php
  require '../config/DatabaseConnection.php';  

  $empID = mysqli_real_escape_string($connect, $_POST['empID']); //wala bang limit yung empID
  $fname = mysqli_real_escape_string($connect, $_POST['fname']);
  $mname = mysqli_real_escape_string($connect, $_POST['mname']);
  $lname = mysqli_real_escape_string($connect, $_POST['lname']);
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);
  $conpassword = mysqli_real_escape_string($connect, $_POST['conpassword']);
  $poslevel = "";
  $dept = "";
  $month = "";
  $day = "";
  $year = "";
  
  if(isset($_POST['poslevel']) && isset($_POST['dept']) && 
     isset($_POST['month']) && isset($_POST['day']) && isset($_POST['year']))
  {
    $poslevel = $_POST['poslevel'];
    $dept = $_POST['dept'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];   
  }

  $fname = ucwords(strtolower($fname));
  $mname = ucwords(strtolower($mname));
  $lname = ucwords(strtolower($lname));
 
  $password = hash("sha256", $password);
  $sql= "insert into `tbluser` values ('$empID','$fname','$mname','$lname','$year-$month-$day', '$poslevel', '$dept', '$username', '$password')";

  $result = mysqli_query($connect, $sql);    

  if($result)
  {
    $response['status'] = 'success';  
  }
  else 
  {
    $response['status'] = 'error';  
  }
  header('Content-type: application/json');
  echo json_encode($response);
?>