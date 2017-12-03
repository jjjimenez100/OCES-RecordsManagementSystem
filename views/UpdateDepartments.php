<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasUpdateDepartmentAccess() == false){
        $roleChecker->redirectUser();
    }

  require '../config/DatabaseConnection.php';

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if($connect)
    {
      $newdept = mysqli_real_escape_string($connect, $_POST['newdept']);
      $existdept = "";
      if(isset($_POST['existdept']))
      {
        $existdept = $_POST['existdept'];
      }

      if(isset($_POST['buttonFirst']))
      {
        $buttonFirst = $_POST['buttonFirst'];

        if($buttonFirst == "addFirst")
        {
          if(empty($newdept))
          {
            echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
                  <script type='text/javascript'>
                    $(document).ready(function()
                    {
                      $('#modalEnter').modal('show');
                    });
                  </script>";
          }

          else 
          {
            echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
                  <script type='text/javascript'>
                    $(document).ready(function()
                    {
                      $('#modalAdd').modal('show');
                    });
                  </script>";
          }      
        }       

        else if($buttonFirst == "editFirst")
        {        
          if(empty($existdept) || empty($newdept))
          {
            echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
                  <script type='text/javascript'>
                    $(document).ready(function()
                    {
                      $('#modalSelect').modal('show');
                    });
                  </script>";
          }

          else  
          {
            echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
                  <script type='text/javascript'>
                    $(document).ready(function()
                    {
                      $('#modalEdit').modal('show');
                    });
                  </script>";
          }
        }  
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Departments - OCES</title>
    <!--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='../resources/js/jquery-3.2.1.min.js'></script>-->
      <?php
        require '../partials/cssmetafiles.php' ;
      ?>
    <link type="text/css" rel="stylesheet" href="../resources/css/styles.css">
      <script src='../resources/js/jquery-3.2.1.min.js'></script>
    <!--<link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
  </head>

  <body>
  <!-- HEADING -->
  <?php
      //require 'NavigationBar.php';
    require '../partials/navigationbar.php' ;
  ?>  

  <!-- FORM -->
  <div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-pencil" aria-hidden="true"></i> Update Departments</h2>
    <hr style="border: 1px solid #CFB53B"><br>
      <form method="post">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">EXISTING DEPARTMENTS</label>
          <div class="col-sm-10">
            <div>              
            <select name="existdept" class="selectpicker" id="btn_info" style="height: 37.5px; padding-bottom: 5px">
              <option value="" selected disabled>Select Department To Edit</option>
              <?php 
                $sql = mysqli_query($connect, "select * from tbldepartment");

                while ($row = $sql->fetch_assoc())
                {
                  ?> 
                  <option <?php if (isset($_POST['existdept']) && $_POST['existdept'] == $row['Department'] ) echo "selected";?>>
                    <?php echo $row['Department'] ?>
                  </option>
                  <?php
                }
              ?>      
            </select>
            </div>        
          </div>
        </div> 
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">NEW DEPARTMENT</label>
          <div class="col-sm-10">
            <input name="newdept" id="newdept" type="text" class="form-control" placeholder="type here" 
            value="<?php echo isset($_POST['newdept']) ? $_POST['newdept'] : '';?>"/>
          </div>
        </div>          
        <hr style="border: 1px solid #CFB53B"><br>
        
        <center>
          <button name="buttonFirst" value="addFirst" class="btn" id="btn_create"> ADD NEW DEPARTMENT </button>
          <button name="buttonFirst" value="editFirst" class="btn" id="btn_create"> EDIT EXISTING DEPARTMENT </button>
        </center>

        <?php
          require '../partials/modals/modal_script.php';
          require '../partials/disablekeys_script.php';
        ?> 

      </form>      
  </div>       

  </body>

  <!-- JAVASCRIPT -->
  <?php
    require '../partials/javascriptfiles.php';
  ?>
  
</html>