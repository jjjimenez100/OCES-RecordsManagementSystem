<?php
    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
    $FILE_STORAGE_DIRECTORY = dirname(__FILE__).'/../storage/';
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasApproveReportAccess() == false){
        $roleChecker->redirectUser();
    }

    require '../config/autoloader.php';
    if(isset($_POST["reportID"]) && isset($_POST["isApproved"])){
        $report = Report::find($_POST["reportID"]);
        if($report){
            if($_POST["isApproved"] == "true"){
                $report->Remarks = "Approved";
                $report->save();
            }
            else{
                unlink($DOCUMENT_ROOT.'/OCES/storage/'.$report->Activity_Title.'.pdf');
                unlink($DOCUMENT_ROOT.'/OCES/storage/'.$report->Activity_Title.'.xlsx');
                $report->delete();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Approve Reports</title>
    <?php
        require '../partials/cssmetafiles.php' ;
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
</head>
<body>
<!-- NAVIGATION LINK -->
<?php
    require '../partials/navigationbar.php';
?>
<!-- END NAVIGATION LINK -->
<br>
<h1 class="text-center" style="padding-top: 50px"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Approval of Reports</h1>
<hr>
<!-- Modal -->

<?php
    require '../partials/modals/approvingmodal.php';
?>

<!--END MODAL-->
<?php
    $approving = true;
    require '../partials/viewreport_script.php';
?>
<form action="<?php echo htmlspecialchars("ApproveReport.php");?>" method="POST" id="hiddenForm">
    <input type="hidden" name="reportID" id="reportID">
    <input type="hidden" name="isApproved" id="isApproved">
</form>
</body>

<?php
    require '../partials/javascriptfiles.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript" src="../resources/js/oces.functions-1.0.js"></script>
<script>
    $(document).ready(initApproveReport(["modal-body", "btn_create",
        "hiddenForm", "reportID", "isApproved", "approve", "reject"], "#tblReports"));
</script>
</html>