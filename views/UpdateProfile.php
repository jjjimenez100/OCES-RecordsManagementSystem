<?php
    require '../middleware/RoleMiddleware.php';
    require '../config/autoloader.php' ;
    if($roleChecker->hasUpdateProfileAccess() == false){
        $roleChecker->redirectUser();
    }

    require '../config/DatabaseConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Profile - OCES</title>
    <?php
        require '../partials/cssmetafiles.php';
    ?>
    <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
    <?php
      require '../partials/javascriptfiles.php';
      require '../partials/updateprofile_script.php';
    ?>
  </head>

  <body>
        <?php
            require '../partials/navigationbar.php' ;
        ?>
  <!-- FORM -->
  <div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-user" aria-hidden="true"></i> Update Profile</h2>
    <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
      <form method ="POST" action="" class="updateForm">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="employee id" id="empID" name="id" readonly value="<?php
                $loggedInUser = User::where('Username', $_SESSION['username'])->first();
                echo $loggedInUser->UserID;
              ?>">
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="first_name" placeholder="first name" id="fname" value ="<?php echo $loggedInUser->First_Name ?>" style="text-transform: capitalize;" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="middle_name" placeholder="middle name" id="mname" value="<?php echo $loggedInUser->Middle_Name ?>" style="text-transform: capitalize;" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="last_name" placeholder="last name" id="lname" value="<?php echo $loggedInUser->Last_Name?>" style="text-transform: capitalize;" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-6"><input type="text" class="form-control" name="email" id="username" placeholder="hau username" value="<?php echo $loggedInUser->Username ?>" required>
			        </div>
              <div class="col-sm-6"><input type="text" class="form-control" name="address" placeholder="@hau.edu.ph" value ="@hau.edu.ph" readonly></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="password" id="password" value ="<?php echo $loggedInUser->Password ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="retypePassword" placeholder="re-type password" id="retypePassword" value ="<?php echo $loggedInUser->Password ?>" required>
            </div>
          </div>

          <!--<div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
              <div>
                  <select class="selectpicker"  id="btn_info" name = "accountType" style="height: 37px" required>

                    <option value ="System Administrator" <?php /*if($loggedInUser->Position_Level == "System Administrator") echo "selected"*/?>> System Administrator</option>
                    <option value ="OCES Administrator" <?php /*if($loggedInUser->Position_Level == "OCES Administrator") echo "selected"*/?>>OCES Administrator</option>
                    <option value ="OCES Staff" <?php /*if($loggedInUser->Position_Level == "OCES Staff") echo "selected"*/?>>OCES Staff</option>
                    <option value ="CSCB Representative" <?php /*if($loggedInUser->Position_Level == "CSCB Representative") echo "selected"*/?>>CSCB Representative</option>
                    <option value ="University Administrator" <?php /*if($loggedInUser->Position_Level == "University Administrator") echo "selected"*/?>>University Administrator</option>
                    <optgroup label="Faculty">
                      <option value ="Full-Time Faculty" <?php /*if($loggedInUser->Position_Level == "Full-Time Faculty") echo "selected"*/?>>Full-Time Faculty</option>
                      <option value ="Part-Time Faculty" <?php /*if($loggedInUser->Position_Level == "Part-Time Faculty") echo "selected"*/?>>Part-Time Faculty</option>
                    </optgroup>
                    <optgroup label="Non-Teaching Personnel">
                      <option value ="Technical Support Services" <?php /*if($loggedInUser->Position_Level == "Technical Support Services") echo "selected"*/?>>Technical Support Services</option>
                      <option value ="Academic Support Services" <?php /*if($loggedInUser->Position_Level == "Academic Support Services") echo "selected"*/?>>Academic Support Services</option>
                      <option value ="Office Personnel" <?php /*if($loggedInUser->Position_Level == "Office Personnel") echo "selected"*/?>>Office Personnel</option>
                      <option value ="Field Personnel" <?php /*if($loggedInUser->Position_Level == "Field Personnel") echo "selected"*/?>>Field Personnel</option>
                    </optgroup>
                  </select>
                </div>
            </div>
          </div>-->

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DEPARTMENT</label>
            <div class="col-sm-10">
              <div>
                    <select class="selectpicker btn_info" id="dept" style="height: 37.5px; padding-bottom: 5px" name = "department" required>
                        <?php
                            $sql = mysqli_query($connect, "SELECT * FROM tbldepartment");
                            while ($row = $sql->fetch_assoc())
                            {
                                if($row['Department'] == $loggedInUser->Department){
                                    echo '<option id="btn_info" selected>'.$row['Department'].'</option>';
                                }
                                else{
                                    echo '<option id="btn_info">'.$row['Department'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE OF EMPLOYMENT</label>
            <div class="col-sm-10">
              <select class="selectpicker btn_info" name="month" id="month" style="height: 37px" required onchange="configureDateDropDown(this, document.getElementById('day'))">
                <?php
                    $explodedDate = explode("-", $loggedInUser->Date_Of_Employment);
                    for($counter=1; $counter<=12; $counter++){
                        if($counter<10){
                            $suffix = '0' . $counter;
                            if($suffix == $explodedDate[1]){
                                echo '<option value = "'.$suffix.'"selected>'.'0'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$suffix.'">'.'0'.$counter.'</option>';
                            }
                        }
                        else{
                            if($counter == $explodedDate[1]){
                                echo '<option value = "'.$counter.'"selected>'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$counter.'">'.$counter.'</option>';
                            }
                        }
                    }
                ?>
				      </select>

              <select class="selectpicker btn_info" name="day" id="day" style="height: 37px" required>
                <?php
                    for($counter=1; $counter<=31; $counter++){
                        if($counter<10){
                            $suffix = '0' . $counter;
                            if($suffix == $explodedDate[2]){
                                echo '<option value = "'.$suffix.'"selected>'.'0'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$suffix.'">'.'0'.$counter.'</option>';
                            }
                        }
                        else{
                            if($counter == $explodedDate[2]){
                                echo '<option value = "'.$counter.'"selected>'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$counter.'">'.$counter.'</option>';
                            }
                        }
                    }
                ?>
			        </select>

              <select class="selectpicker btn_info" name="year" id="year" style="height: 37px" required>
                <?php
                for($counter=1950; $counter<=date("Y"); $counter++){
                    if($counter == $explodedDate[0]){
                        echo '<option value = "'.$counter.'"selected>'.$counter.'</option>';
                    }
                    else{
                        echo '<option value = "'.$counter.'">'.$counter.'</option>';
                    }
                }
                ?>
			        </select>  
            </div>
          </div>    
          <hr style="border: 1px solid #CFB53B"><br>
	        <button type="submit" class="btn" id="btn_create" name="updateProfile">UPDATE PROFILE</button>
      </form>      
  </div>        
  </body>
  
  <!-- JAVASCRIPT -->
  <?php
  require '../partials/javascriptfiles.php' ;
  require '../partials/disablekeys_script.php' ;
  require '../partials/modals/updateacctmodal_script.php' ;
  require '../partials/date_script.php' ;
  ?>
</html>