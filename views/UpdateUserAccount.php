<?php
require '../middleware/RoleMiddleware.php';
require '../config/autoloader.php' ;
if($roleChecker->hasUpdateUserAccountAccess() == false){
    $roleChecker->redirectUser();
}

require '../config/DatabaseConnection.php';
$flag = false;
if(isset($_POST['updateProfile'])) {
    $username = $_SESSION['selectedUsername'];
    if(isset($_POST['first_name']))
    {
        $fname = $_POST['first_name'];
        $updateQuery = $connect->query("UPDATE tbluser SET `First_Name` = '$fname' WHERE `Username` = '$username'");
    }

    if(isset($_POST['middle_name']))
    {
        $mname = $_POST['middle_name'];
        $updateQuery = $connect->query("UPDATE tbluser SET `Middle_Name` = '$mname' WHERE `Username` = '$username'");
    }

    if(isset($_POST['last_name']))
    {
        $lname = $_POST['last_name'];
        $updateQuery = $connect->query("UPDATE tbluser SET `Last_Name` = '$lname' WHERE `Username` = '$username'");
    }

    if(isset($_POST['password']))
    {
        if ($_POST['password']!= $_POST['retypePassword'])
        {
            echo '<script language="javascript">';
            echo 'alert("Password does not match.")';
            echo '</script>';
            $flag = true;
        }
        else
        {
            $password = $_POST['password'];
            $updateQuery = $connect->query("UPDATE tbluser SET `Password` = '$password' WHERE `Username` = '$username'");
        }
    }

    if(isset($_POST['department']))
    {
        $dept = $_POST['department'];
        $updateQuery = $connect->query("UPDATE tbluser SET `Department` = '$dept' WHERE `Username` = '$username'");
    }

    if(isset($_POST['accountType']))
    {
        $accType = $_POST['accountType'];
        $updateQuery = $connect->query("UPDATE tbluser SET `Position_Level` = '$accType' WHERE `Username` = '$username'");
        if($_SESSION['username'] == $username){
            $_SESSION['navbar'] = $accType ;
        }
    }

    if(isset($_POST['email']))
    {
        $mail = $_POST['email'];
        $updateQuery = $connect->query("UPDATE tbluser SET `Username` = '$mail' WHERE `username` = '$username'");
        if($_SESSION['username'] == $username){
            $_SESSION['username'] = $mail;
            $username = $_SESSION['username'];
        }
    }
    if(isset($_POST['month']) && isset($_POST['year']) && isset($_POST['day']))
    {
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $date = $year."-".$month."-".$day;
        if($year <= date("Y")){
            $updateQuery = $connect->query("UPDATE tbluser SET `Date_Of_Employment` = '$date' WHERE `Username` = '$username'");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Choose a valid date.")';
            echo '</script>';
            $flag = true;
        }
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Choose a valid date.")';
        echo '</script>';
        $flag = true;
    }

    if(!$flag){
        echo '<script type="text/javascript">';
        echo 'alert("Updated user account.");';
        echo 'window.location.href = "UpdateUserAccount.php";';
        echo '</script>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User Accounts - OCES</title>
    <?php
    require '../partials/cssmetafiles.php' ;
    ?>
    <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
</head>

<body>
<?php
require '../partials/navigationbar.php' ;
?>
<!-- FORM -->
<div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> Update User Accounts</h2><br>
    <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
    <form method = "POST" action="">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10 form-group row">
                <div class="col-sm-6"><input type="text" class="form-control" name = "id" placeholder="employee id"
                                             value = "<?php if(isset($_POST['id'])) { echo $_POST['id'];} ?>"></div>   <!-- RETAIN VALUE -->

                <div class="col-sm-5"><button type="submit" class="btn" name = "search" id="btn_create" button onclick = "">SEARCH</button></div>
                <?php
                if(isset($_POST['search']))
                {
                    $id = $connect->real_escape_string($_POST['id']);
                    $findQuery = $connect->query("SELECT * FROM tbluser WHERE `UserID` = '$id'");
                    if($findQuery->num_rows >0)
                    {
                        echo '<script language="javascript">';
                        echo 'alert("User Exist")';
                        echo '</script>';
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
                        echo '<script language="javascript">';
                        echo 'alert("User does not exist")';
                        echo '</script>';
                    }
                }
                ?>
            </div>
        </div>

        <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name = "first_name" placeholder="first name" value ="<?php if(isset($firstname)){echo $firstname;}?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name = "middle_name" placeholder="middle name" value="<?php if(isset($middlename)){echo $middlename;}?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name = "last_name" placeholder="last name" value="<?php if(isset($lastname)){echo $lastname;}?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
                <div class="col-sm-6"><input type="text" class="form-control" name = "email" placeholder="hau username" value="<?php if(isset($str)){echo $str;}?>">
                </div>
                <div class="col-sm-6"><input type="text" class="form-control" name = "address" placeholder="@hau.edu.ph" value ="@hau.edu.ph" readonly></div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name = "password" placeholder="password" value ="<?php if(isset($password)){echo $password;}?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name = "retypePassword" placeholder="re-type password" value ="<?php if(isset($password)){echo $password;}?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
                <div>
                    <select class="selectpicker"  id="btn_info" name = "accountType" style="height: 37px">

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
                    <select class="selectpicker" id="btn_info" style="height: 37.5px; padding-bottom: 5px" name = "department">
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
                <select class="selectpicker btn_info" name = "month" id="month" style="height: 37px">
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

                <select class="selectpicker btn_info" name = "day" id="day" style="height: 37px">
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

                <select class="selectpicker btn_info" name = "year" id="year" style="height: 37px">
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
        <button type="submit" class="btn" id="btn_create" name="updateProfile" <?php if(!isset($selectedUser)) echo 'disabled';?>>UPDATE PROFILE</button>
    </form>

</div>

</body>

<!-- JAVASCRIPT -->
<?php
require '../partials/javascriptfiles.php' ;
?>
</html>