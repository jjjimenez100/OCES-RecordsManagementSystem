<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create User Account - OCES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
        require 'partials/stylesheets.php';
    ?>
    <style>
        #form_padding{
            padding: 50px;
        }
    </style>
</head>

<body>

<!-- HEADING -->
<?php
    require 'partials/header.php';
?>

<!-- FORM -->
<div class="container" id="form_padding">
    <h2>Create User Account</h2>
    <br>
    <form>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="employee id">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="first name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="middle name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="last name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
                <div class="col-sm-6"><input type="text" class="form-control" placeholder="hau username"></div>
                <div class="col-sm-6"><input type="text" class="form-control" placeholder="@hau.edu.ph" readonly></div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="re-type password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
                <div>
                    <select class="selectpicker"  id="btn_info" style="height: 37px">
                        <option selected disabled>Select Type</option>
                        <option>System Administrator</option>
                        <option>OCES Administrator</option>
                        <option>OCES Staff</option>
                        <option>CSCB Representative</option>
                        <option>University Administrator</option>
                        <optgroup label="Employee">
                            <option>Faculty</option>
                            <option>Non-Teaching Personnel</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">DEPARTMENT</label>
            <div class="col-sm-10">
                <div>
                    <select class="selectpicker" id="btn_info" style="height: 37.5px; padding-bottom: 5px">
                        <option  selected disabled>Select Department</option>
                        <option>Basic Education</option>
                        <option>CCJEF</option>
                        <option>CICT</option>
                        <option>SAS</option>
                        <option>SBA</option>
                        <option>SEA</option>
                        <option>SED</option>
                        <option>SHTM</option>
                        <option>SNAMS</option>
                    </select>
                    <button type="button" class="btn" id="btn_info" style="">
                        <span class="fa fa-pencil"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE OF EMPLOYMENT</label>
            <div class="col-sm-10">
                <div>
                    <select class="selectpicker" id="btn_info" style="height: 37px">
                        <option selected disabled>MM</option>
                        <?php
                            for($counter=1; $counter<=12; $counter++){
                                echo "<option> $counter </option>";
                            }
                        ?>
                    </select>
                    <select class="selectpicker" id="btn_info" style="height: 37px">
                        <option selected disabled>DD</option>
                        <?php
                            for($counter=1; $counter<=31; $counter++){
                                echo "<option> $counter </option>";
                            }
                        ?>
                    </select>
                    <select class="selectpicker" id="btn_info" style="height: 37px">
                        <option selected disabled>YYYY</option>
                        <?php
                            for($counter=1970; $counter<=2050; $counter++){
                                echo "<option> $counter </option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <button type="submit" class="btn" id="btn_create">SIGN UP</button>
</div>

<!-- JAVASCRIPT -->
<?php
    require 'partials/scripts.php';
?>
</body>
</html>