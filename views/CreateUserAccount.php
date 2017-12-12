<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasCreateUserAccountAccess() == false){
        $roleChecker->redirectUser();
    }

  require '../config/DatabaseConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create User Account - OCES</title>
    <?php
        require '../partials/cssmetafiles.php' ;
    ?>
    <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
    <?php
      require '../partials/javascriptfiles.php';
      require '../partials/createaccount_script.php';
    ?>
  </head>

  <body>
  <!-- HEADING -->
  <?php
      require '../partials/navigationbar.php';
  ?> 

  <!-- FORM -->
  <div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-user-plus" aria-hidden="true"></i> Create User Account</h2>
    <hr style="border: 1px solid #CFB53B"><br>
      <form method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10">
              <input name="empID" id="empID" type="text" class="form-control" placeholder="employee id" required>               
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
              <input name="fname" id="fname" type="text" class="form-control" placeholder="first name" style="text-transform: capitalize" required>              
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
              <input name="mname" id="mname" type="text" class="form-control" placeholder="middle name" style="text-transform: capitalize" required> 
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
              <input name="lname" id="lname" type="text" class="form-control" placeholder="last name" style="text-transform: capitalize" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-6">
                <input name="username" id="username" type="text" class="form-control" placeholder="hau username" required></div>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="@hau.edu.ph" readonly></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
              <input name="password" id="password" type="password" class="form-control" placeholder="password" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
              <input name="conpassword" id="conpassword" type="password" class="form-control" placeholder="re-type password" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
              <div>
                  <select name="poslevel" class="btn_info selectpicker" id="poslevel" style="height: 37px" required>    
                    <option value="" selected disabled>Select Type</option>
                    <option>System Administrator</option>
                    <option>OCES Administrator</option>
                    <option>OCES Staff</option>
                    <option>CSCB Representative</option>
                    <option>University Administrator</option>
                    <optgroup label="Faculty">
                      <option>Full-Time Faculty</option>
                      <option>Part-Time Faculty</option>
                    </optgroup>
                    <optgroup label="Non-Teaching Personnel">
                      <option>Technical Support Services</option>
                      <option>Academic Support Services</option>
                      <option>Office Personnel</option>
                      <option>Field Personnel</option>
                    </optgroup>
                 </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DEPARTMENT</label>
            <div class="col-sm-10">
              <div>
                  <select name="dept" class="btn_info selectpicker" id="dept" style="height: 37.5px; padding-bottom: 5px" required>
                    <option value="" selected disabled>Select Department</option>
                    <?php 
                      $sql = mysqli_query($connect, "SELECT * FROM tbldepartment");

                      while ($row = $sql->fetch_assoc())
                      {
                        ?> 
                        <option><?php echo $row['Department'] ?></option>
                        <?php
                      }
                    ?>  
                  </select>
                  <a style="color: inherit" href="UpdateDepartments.php">
                    <button type="button" class="btn" id="btn_info"><span class="fa fa-pencil"></span></button>
                  </a>
              </div>        
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE OF EMPLOYMENT</label>
            <div class="col-sm-10">
              <div>
                  <select name="month" class="selectpicker btn_info" id="month" style="height: 37px" required onchange="configureDateDropDown(this, document.getElementById('day'))"></select>
                  <select name="day" class="selectpicker btn_info" id="day" style="height: 37px" required></select>
                  <select name="year" class="selectpicker btn_info" id="year" style="height: 37px" required></select>
              </div>
            </div>
          </div>  
        <hr style="border: 1px solid #CFB53B"><br>
      <button name="signup" type="submit" class="btn" id="btn_create">SIGN UP</button>
      </form>
  </div>
  
  <!-- JAVASCRIPT -->
  <?php
      require '../partials/date_script.php';
      require '../partials/modals/modal_script.php';
      require '../partials/disablekeys_script.php';
  ?> 

  </body>  
</html>