<?php
    //require dirname(__FILE__).'/../../config/autoloader.php';
    $FILE_STORAGE_DIRECTORY = dirname(__FILE__).'/../storage/';
    $reports = "";
    if(isset($approving)){
        $reports = Report::where('Remarks', 'Pending')->get();
    }
    else if(isset($individualViewing)){
        $userLoggedIn = $_SESSION['username'];
        $reports = Report::where('UserID', $userLoggedIn)->get();
    }
    else{
        $reports = Report::all();
    }
?>

<div id="no-more-tables">
    <table class="table table-responsive table-striped table-hover table-sm" id="tblReports">
        <thead class="table-dark">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Activity Title</th>
                <th class="text-center">Date</th>
                <th class="text-center">Venue</th>
                <th class="text-center">Beneficiaries</th>
                <th class="text-center"><i class="fa fa-download" aria-hidden="true"></i> Files</th>
                <?php if(isset($approving)): ?>
                    <th class="text-center">Actions</th>
                <?php endif; ?>
                <th class="d-none"></th>
                <th class="d-none"></th>
                <th class="d-none"></th>
                <th class="d-none"></th>
                <th class="d-none"></th>
            </tr>
        </thead>

        <tbody>
            <?php
                $counter = 1;
                foreach($reports as $report):
            ?>
                    <?php
                        if($report->Remarks == "Pending" && !isset($approving)):
                            continue;
                        endif;
                    ?>
                        <tr class="text-center">
                            <td data-title="No.">
                                <?php echo $counter ?>
                            </td>
                            <td data-title="Activity Title" style="word-break: break-all;">
                                <?php echo $report->Activity_Title; ?>
                            </td>
                            <td data-title="Date">
                                <?php echo $report->Date; ?>
                            </td>
                            <td data-title="Venue">
                                <button type="button" class="btn btn-dark" data-toggle="popover" title="
                                <?php echo $report->Activity_Title;?>'s Venue" data-content="<?php echo $report->Venue; ?>">
                                    View Venue <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td data-title="Beneficiaries"><button type="button" class="btn btn-dark" data-toggle="popover" title="<?php echo $report->Activity_Title; ?>'s Beneficiaries" data-content="<?php echo $report->Beneficiaries; ?>">View Beneficiaries <i class="fa fa-arrow-right" aria-hidden="true"></i></button></td>
                            <td data-title="Files" data-id="<?php echo $report->Activity_Code; ?>">
                                <a class="btn btn-dark" href="<?php echo $FILE_STORAGE_DIRECTORY.$report->Activity_Title.'.xlsx'?>" download><i class="fa fa-file-excel-o" aria-hidden="true"></i> .xlsx</a>
                                <a class="btn btn-dark" href="<?php echo $FILE_STORAGE_DIRECTORY.$report->Activity_Title.'.pdf'?>" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                            </td>
                            <?php if(isset($approving)): ?>
                                <td class="text-center" style="vertical-align: middle;">
                                    <button class="btn btn-success approve" data-activity="<?php echo $report->Activity_Title;?>" data-toggle="modal" data-target="#modalAdd" data-id="<?php echo $report->Activity_Code; ?>"><i class="fa fa-check" aria-hidden="true"></i> Approve</button>
                                    <button class="btn btn-danger reject" data-activity="<?php echo $report->Activity_Title;?>" data-toggle="modal" data-target="#modalAdd" data-id="<?php echo $report->Activity_Code; ?>"><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
                                </td>
                            <?php endif; ?>
                            <td class="d-none"><?php echo $report->user->Department; ?></td>
                            <td class="d-none"><?php echo $report->Actual_Participation; ?></td>
                            <td class="d-none"><?php echo $report->UserID; ?></td>
                            <td class="d-none"><?php echo $report->School_Year; ?></td>
                            <td class="d-none"><?php echo $report->Semester; ?></td>
                        </tr>
            <?php
                $counter++;
                endforeach;
            ?>
        </tbody>
    </table>
</div>