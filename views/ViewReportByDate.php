<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasViewReportByDateAccess() == false){
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
        <label class="lead col-sm-2 col-form-label">Date Range</label>
        <div class="col-sm-10 form-group row">
            <div class="col-sm-4">
                <input type="date" class="form-control" id="from" name="from">
            </div>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="to">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="lead col-sm-2 col-form-label">School Year</label>
        <div class="col-sm-10 form-group row">
            <div class="col-sm-5">
                <select class="selectpicker btn_info" id="from_year" style="height: 37px">

                </select>
                <select class="selectpicker btn_info" id="to_year" style="height: 37px">

                </select>
                <select class="selectpicker btn_info" id="semester" style="height: 37px">
                </select>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="lead col-sm-2 col-form-label">Exact Date</label>
        <div class="col-sm-10 form-group row">
            <div class="col-sm-4">
                <input type="date" class="form-control" id="exact" name="exact">
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
?>
<?php
    require '../partials/viewingjsfiles.php' ;
?>
<script>
    $(document).ready(function(){
       initViewByDate(["from_year", "to_year", "semester", "from", "to", "exact"],
           "#tblReports", 1950, new Date().getFullYear(), 2);
    });
</script>
</html>