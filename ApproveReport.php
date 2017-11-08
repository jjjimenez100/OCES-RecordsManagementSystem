<?php
    require 'config/autoloader.php';

    if(isset($_POST["reportID"]) && isset($_POST["isApproved"])){
        $report = Report::find($_POST["reportID"]);
        if($report){
            if($_POST["isApproved"] == "true"){
                $report->Remarks = 1;
                $report->save();
            }
            else{
                $report->delete();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Approve Reports</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
    <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
    <link rel="shortcut icon" href="resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<!-- NAVIGATION LINK -->
<?php
    require 'partials/navs/NAV_OCESAdministrator.php';
?>
<!-- END NAVIGATION LINK -->
<br>
<h1 class="text-center" style="padding-top: 50px"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Approval of Reports</h1>
<hr>
<!-- Modal -->

<?php
    require 'partials/samplemodal_script.php';
?>

<!--END MODAL-->
<?php
    $approving = true;
    require 'partials/viewreport_script.php';
?>
<form action="<?php echo htmlspecialchars("ApproveReport.php");?>" method="POST" id="hiddenForm">
    <input type="hidden" name="reportID" id="reportID">
    <input type="hidden" name="isApproved" id="isApproved">
</form>
</body>

<?php
    require 'partials/scripts.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript" src="resources/js/oces.functions-1.0.js"></script>
<script>
    $(document).ready(initApproveReport(["modal-body", "btn_create",
        "hiddenForm", "reportID", "isApproved", "approve", "reject"], "#tblReports"));
</script>
</html>