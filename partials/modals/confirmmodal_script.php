<?php 
      
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if($connect)
    {
      $employeeid = mysqli_real_escape_string($connect, $_POST['empID']);
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
      $_SESSION['modalContent'] = "";

      if(isset($_POST['poslevel']) && isset($_POST['dept']) && 
         isset($_POST['month']) && isset($_POST['day']) && isset($_POST['year']))
      {
        $poslevel = $_POST['poslevel'];
        $dept = $_POST['dept'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];   
        $_SESSION['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
      }

      if(empty($employeeid) || empty($fname) || empty($mname) || empty($lname) || empty($year) || empty($month)
          || empty($day) || empty($poslevel) || empty($dept) || empty($username) || empty($password) || empty($conpassword))
      {
        $_SESSION['modalContent'] = '<div class="modal-header" style="background-color: black; color: white">
            <h4 class="modal-title">Reminder</h4>
            <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
          </div>
          <div style="background-color: #CFB53B; height: 5px"></div>  
          <div class="modal-body">
            <p>Please fill in all the ask information.</p>
          </div>';
      }

      else
      {
        if ($password != $conpassword)
        {
          $_SESSION['modalContent'] = '<div class="modal-header" style="background-color: black; color: white">
              <h4 class="modal-title">Reminder</h4>
              <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
            </div>
            <div style="background-color: #CFB53B; height: 5px"></div>  
            <div class="modal-body">
              <p>Passwords do not match.</p>
            </div>';
        }

        else
        {
          $_SESSION['modalContent'] = '<div class="modal-header" style="background-color: black; color: white">
              <h4 class="modal-title">Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
            </div>
            <div style="background-color: #CFB53B; height: 5px"></div>       
            <div class="modal-body">
              <p>Do you want to proceed with creating this account?</p>
              <p><b>Employee No.:</b> <?php echo $_POST["empID"]; ?></p>
              <p><b>Name:</b> <?php $fullname = $_POST["fname"]." ".$_POST["mname"]. " ".$_POST["lname"]; echo ucwords(strtolower($fullname)); ?></p>
              <p><b>Email:</b> <?php echo $_POST["username"]; ?>@hau.edu.ph</p>
              <p><b>Password:</b> <?php echo $_POST["password"]; ?></p>
              <p><b>Account Type:</b> <?php echo $_POST["poslevel"]; ?></p>
              <p><b>Department:</b> <?php echo $_POST["dept"]; ?></p>
              <p><b>Date of Employment:</b> <?php echo $_POST["month"]."-".$_POST["day"]."-".$_POST[" year"]; ?></p>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn" id="btn_create">Proceed</button>
              <button type="button" class="btn" id="btn_create" data-dismiss="modal">Cancel</button>
            </div>';
        }    
      } 
    }
  }
?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <?php echo $_SESSION['modalContent']; ?>
    </div>
  </div>
  <?php 
  if(isset($_POST['submit']))
  {
    $sql="";
    $fname = ucwords(strtolower($fname));
    $mname = ucwords(strtolower($mname));
    $lname = ucwords(strtolower($lname));

    $sql= "insert into `tbluser` values ('$employeeid','$fname','$mname','$lname','".$_SESSION['date']."', '".$_POST['poslevel']."', '".$_POST['dept']."', '$username', '$password')";

    $result = mysqli_query($connect, $sql);

    if($result)
    {
      echo "<script src='js/jquery-3.2.1.min.js'></script>
            <script type='text/javascript'>
              $(document).ready(function()
              {
                $('#modalSuccess').modal('show');

                setTimeout(function()
                { 
                  window.location.href = window.location.href;
                },2000)

              });
            </script>";
    }
    else
    {
      echo "<script src='js/jquery-3.2.1.min.js'></script>
            <script type='text/javascript'>
              $(document).ready(function()
              {
                $('#modalError').modal('show');
              });
            </script>";           
    }
  }
  ?>

</div>