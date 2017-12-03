<?php 
  if(isset($_POST['proceed']))
  {
    $submit = $_POST['proceed'];

    if ($submit == "edit")
    {
      $edit= "update `tbldepartment` set `Department`='$newdept' where `Department`='$existdept'";
      
      $resultEdit = mysqli_query($connect, $edit);

      if($resultEdit)
      {
        echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
              <script type='text/javascript'>
                $(document).ready(function()
                {
                  $('#modalSuccessEdit').modal('show');
                  
                  setTimeout(function()
                  {
                    window.location.href = window.location.href;
                  },2000)
                  
                });
                
              </script>";
      }
      else
      {
        echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
              <script type='text/javascript'>
                $(document).ready(function()
                {
                  $('#modalErrorEdit').modal('show');
                });
              </script>";           
      }
    }
  }
?>