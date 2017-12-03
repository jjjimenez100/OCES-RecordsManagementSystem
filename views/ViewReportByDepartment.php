<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasViewReportByDepartmentAccess() == false){
        $roleChecker->redirectUser();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Reports - OCES</title>
    <?php
        require '../partials/cssmetafiles.php' ;
    ?>
    <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
</head>
<body>

<?php
require '../partials/navigationbar.php';
?>
<br>
<h2 class="text-center" style="padding-top: 50px"><i class="fa fa-file-text" aria-hidden="true"></i> View Reports</h2>
<div class="container-fluid">
    <hr style="border: 1px solid #CFB53B"><br>
    <div class="form-group row">
        <label class="lead col-sm-2 col-form-label">Department</label>
        <div class="col-sm-10 form-group row">
            <div class="col-sm-4" id="selectDate">
                <select class="selectpicker" id="btn_info" style="height: 37.5px; padding-bottom: 5px">
                    <option  selected disabled>Select Department</option>
                    <option value="">All</option>
                    <?php
                        require '../config/autoloader.php';
                        $departments = Department::all();
                        foreach($departments as $department){
                            echo '<option>'.$department->Department.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-4">

            </div>          
        </div>
    </div>    
    <hr style="border: 1px solid #CFB53B"><br>
    
    <?php
        require '../partials/viewreport_script.php';
    ?>

</div>


</body>

<?php
    require '../partials/javascriptfiles.php';
?>
<?php
    require '../partials/viewingjsfiles.php' ;
?>
<script>
    $(document).ready(function(){
        initViewByDepartmentInvolvement("#tblReports", 6, '#btn_info', "change");
    });
</script>
</html>