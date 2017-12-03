<?php
  if(isset($_POST['proceed']))
  {
    $submit = $_POST['proceed'];

    if($submit == "add")
    {
      $add= "insert into `tbldepartment` values ('$newdept')";

      $resultAdd = mysqli_query($connect, $add);

      if($resultAdd)
      {
        echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
              <script type='text/javascript'>
                $(document).ready(function()
                {
                  $('#modalSuccessAdd').modal('show');
                  
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
                  $('#modalErrorAdd').modal('show');
                });
              </script>";           
      }
    }
  }
?>