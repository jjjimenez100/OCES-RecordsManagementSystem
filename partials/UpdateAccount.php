<?php
    require '../config/DatabaseConnection.php';  

    $empID = mysqli_real_escape_string($connect, $_POST['id']); 
    $fname = mysqli_real_escape_string($connect, $_POST['first_name']);
    $mname = mysqli_real_escape_string($connect, $_POST['middle_name']);
    $lname = mysqli_real_escape_string($connect, $_POST['last_name']);
    $username = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $conpassword = mysqli_real_escape_string($connect, $_POST['retypePassword']);
    $poslevel = "";
    $dept = "";
    $month = "";
    $day = "";
    $year = "";

    if(isset($_POST['accountType']) && isset($_POST['department']) && 
     isset($_POST['month']) && isset($_POST['day']) && isset($_POST['year']))
    {
        $poslevel = $_POST['accountType'];
        $dept = $_POST['department'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];   
    }

    $fname = ucwords(strtolower($fname));
    $mname = ucwords(strtolower($mname));
    $lname = ucwords(strtolower($lname));

    $password = hash("md5", $password);
    $sql= "update `tbluser` set `First_Name`='$fname',`Middle_Name`='$mname',`Last_Name`='$lname',`Date_Of_Employment`='$year-$month-$day',`Position_Level`='$poslevel',`Department`='$dept',`Username`='$username',`Password`='$password' WHERE `UserID`=$empID";

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