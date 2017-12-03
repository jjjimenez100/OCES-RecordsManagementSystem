<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasViewReportByInvolvementAccess() == false){
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
            <label class="col-sm-2 col-form-label">Type of Involvement</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-2">
                <select class="selectpicker btn_info"  id="group" onchange="configureDropDownLists(this,document.getElementById('participation'))" style="height: 37px">
                  <option selected disabled>Select Group</option>
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>E</option>
                  <option>F</option>
                </select>                
              </div>
              <div class="col-sm-5">
                <select class="selectpicker btn_info"  id="participation" style="height: 37px; max-width: 355px">
                  <option selected disabled>Select Participation</option>
                </select>                
              </div>
            </div>            
          </div>    
    <hr style="border: 1px solid #CFB53B"><br>
    
    <?php
        require '../config/autoloader.php';
        require '../partials/viewreport_script.php';
    ?>

</div>

</body>

<?php
    require '../partials/javascriptfiles.php';
    require '../partials/viewingjsfiles.php' ;
    require '../partials/participation_script.php' ;
?>
<script>
    $(document).ready(function() {
        initViewByDepartmentInvolvement("#tblReports", 7, "#participation", "change");
    });
</script>
</html>