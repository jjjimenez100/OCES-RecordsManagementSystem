<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasViewIndividualReportAccess() == false){
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
    <?php
        require '../config/autoloader.php';
        $individualViewing = true;
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
    $(document).ready(function() {
        initializePopOvers();
        initializeDataTable("#tblReports");
    });
</script>
</html>