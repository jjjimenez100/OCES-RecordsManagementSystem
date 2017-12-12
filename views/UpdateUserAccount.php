<?php
    require '../middleware/RoleMiddleware.php';
    require '../config/autoloader.php' ;
    if($roleChecker->hasUpdateUserAccountAccess() == false){
        $roleChecker->redirectUser();
    }

    require '../config/DatabaseConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User Accounts - OCES</title>
    <?php
    require '../partials/cssmetafiles.php' ;
    ?>
    <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
    <?php
      require '../partials/javascriptfiles.php';
      require '../partials/updateaccount_script.php';
    ?>
</head>

<body>
<?php
require '../partials/navigationbar.php' ;
?>
<!-- FORM -->
<div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> Update User Accounts</h2>
    <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
    <form method = "POST" action="">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10 form-group row">
                <div class="col-sm-6"><input type="text" class="form-control" name="id" id="empID" placeholder="employee id"
                                             value = "<?php if(isset($_POST['id'])) { echo $_POST['id'];} ?>" 
                                             <?php if(isset($_POST['search'])) { echo 'readonly';}?> required></div> 
                <div class="col-sm-5">
                    <button type="submit" class="btn" name="search" id="btn_create">SEARCH</button>
                    <button class="btn" name="clear" id="btn_create" onclick="clearText()" >CLEAR</button>
                </div>
                <?php
                if(isset($_POST['search']))
                {
                    $id = $connect->real_escape_string($_POST['id']);
                    $findQuery = $connect->query("SELECT * FROM tbluser WHERE `UserID` = '$id'");
                    if($findQuery->num_rows >0)
                    {  
                        while($reportdata = $findQuery->fetch_array(MYSQLI_ASSOC))
                        {
                            $firstname = $reportdata['First_Name'];
                            $middlename = $reportdata['Middle_Name'];
                            $lastname = $reportdata['Last_Name'];
                            $Position_Level = $reportdata['Position_Level'];
                            $str = $reportdata['Username'];
                            $password = $reportdata['Password'];
                            $department = $reportdata['Department'];
                        }
                        $selectedUser = User::where('UserID', $id)->first();
                        $_SESSION['selectedUsername'] = $selectedUser->Username;
                    }
                    else
                    {
                        echo "<script src='../resources/js/jquery-3.2.1.min.js'></script>
                              <script type='text/javascript'>
                                $(document).ready(function()
                                {
                                  $('#modalErrorSearch').modal('show');
                                });
                              </script>";                     
                    }
                }
                ?>
                <script type="text/javascript">
                    function clearText()  
                    {
                        window.location.href = window.location.href;
                        document.getElementById('empID').value = "";
                    } 
                </script>
            </div>
        </div>
     </form>
     
     <form method = "POST" action="" class="updateForm">
        <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name = "first_name" id="fname" placeholder="first name" value ="<?php if(isset($firstname)){echo $firstname;}?>" style="text-transform: capitalize;" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name = "middle_name" id="mname" placeholder="middle name" value="<?php if(isset($middlename)){echo $middlename;}?>" style="text-transform: capitalize;" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name = "last_name" id="lname" placeholder="last name" value="<?php if(isset($lastname)){echo $lastname;}?>" style="text-transform: capitalize;" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
                <div class="col-sm-6"><input type="text" class="form-control" id="username" name = "email" placeholder="hau username" value="<?php if(isset($str)){echo $str;}?>" required>
                </div>
                <div class="col-sm-6"><input type="text" class="form-control" name = "address" placeholder="@hau.edu.ph" value ="@hau.edu.ph" readonly></div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name = "password" id="password" placeholder="password" value ="<?php if(isset($password)){echo $password;}?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name = "retypePassword" id="retypePassword" placeholder="re-type password" value ="<?php if(isset($password)){echo $password;}?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
                <div>
                    <select class="btn_info selectpicker" id="poslevel" name = "accountType" style="height: 37px" required>

                        <option value ="System Administrator" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "System Administrator") echo "selected"; }?>> System Administrator</option>
                        <option value ="OCES Administrator" <?php if(isset($selectedUser)){ if($selectedUser->Position_Level == "OCES Administrator") echo "selected"; }?>>OCES Administrator</option>
                        <option value ="OCES Staff" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "OCES Staff") echo "selected"; }?>>OCES Staff</option>
                        <option value ="CSCB Representative" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "CSCB Representative") echo "selected"; }?>>CSCB Representative</option>
                        <option value ="University Administrator" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "University Administrator") echo "selected"; }?>>University Administrator</option>
                        <optgroup label="Faculty">
                            <option value ="Full-Time Faculty" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "Full-Time Faculty") echo "selected"; }?>>Full-Time Faculty</option>
                            <option value ="Part-Time Faculty" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "Part-Time Faculty") echo "selected"; }?>>Part-Time Faculty</option>
                        </optgroup>
                        <optgroup label="Non-Teaching Personnel">
                            <option value ="Technical Support Services" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "Technical Support Services") echo "selected"; }?>>Technical Support Services</option>
                            <option value ="Academic Support Services" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "Academic Support Services") echo "selected"; }?>>Academic Support Services</option>
                            <option value ="Office Personnel" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "Office Personnel") echo "selected"; }?>>Office Personnel</option>
                            <option value ="Field Personnel" <?php if(isset($selectedUser)){if($selectedUser->Position_Level == "Field Personnel") echo "selected"; }?>>Field Personnel</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">DEPARTMENT</label>
            <div class="col-sm-10">
                <div>
                    <select class="btn_info selectpicker" id="dept" style="height: 37.5px; padding-bottom: 5px" name = "department" required>
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM tbldepartment");
                        while ($row = $sql->fetch_assoc())
                        {
                            if(isset($selectedUser) && $row['Department'] == $selectedUser->Department){
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
                <select class="selectpicker btn_info" name = "month" id="month" style="height: 37px" onchange="configureDateDropDown(this, document.getElementById('day'))" required>
                    <?php
                    $explodedDate = explode("-", $selectedUser->Date_Of_Employment);
                    for($counter=1; $counter<=12; $counter++){
                        if($counter<10){
                            $suffix = '0' . $counter;
                            if(isset($selectedUser) && $suffix == $explodedDate[1]){
                                    echo '<option value = "'.$suffix.'"selected>'.'0'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$suffix.'">'.'0'.$counter.'</option>';
                            }
                        }
                        else{
                            if(isset($selectedUser) && $counter == $explodedDate[1]){
                                echo '<option value = "'.$counter.'"selected>'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$counter.'">'.$counter.'</option>';
                            }
                        }
                    }
                    ?>
                </select>

                <select class="selectpicker btn_info" name = "day" id="day" style="height: 37px" required>
                    <?php
                    for($counter=1; $counter<=31; $counter++){
                        if($counter<10){
                            $suffix = '0' . $counter;
                            if(isset($selectedUser) && $suffix == $explodedDate[2]){
                                echo '<option value = "'.$suffix.'"selected>'.'0'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$suffix.'">'.'0'.$counter.'</option>';
                            }
                        }
                        else{
                            if(isset($selectedUser) && $counter == $explodedDate[2]){
                                    echo '<option value = "'.$counter.'"selected>'.$counter.'</option>';
                            }
                            else{
                                echo '<option value = "'.$counter.'">'.$counter.'</option>';
                            }
                        }
                    }
                    ?>
                </select>

                <select class="selectpicker btn_info" name = "year" id="year" style="height: 37px" required>
                    <?php
                    for($counter=1950; $counter<=date("Y"); $counter++){
                        if(isset($selectedUser) && $counter == $explodedDate[0]){
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
        <button type="submit" class="btn btn_update" id="btn_create" name="updateProfile" <?php if(!isset($selectedUser)) echo 'disabled';?>>UPDATE PROFILE</button>
    </form>
</div>

</body>

<!-- JAVASCRIPT -->
<?php
require '../partials/javascriptfiles.php' ;
require '../partials/disablekeys_script.php' ;
require '../partials/modals/updateacctmodal_script.php' ;
?>
</html>