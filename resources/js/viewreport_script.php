<?php
    require dirname(__FILE__).'/../../config/autoloader.php';
    $reports = Report::all();
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
                <th class="d-none"></th>
                <th class="d-none"></th>
                <th class="d-none"></th>
                <th class="d-none"></th>
                <th class="d-none"></th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($reports as $key => $report):
            ?>
                <tr class="text-center">
                    <td data-title="No.">
                        <?php echo $key+1; ?>
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
                        <button class="btn btn-dark"><i class="fa fa-file-excel-o" aria-hidden="true"></i> .xlsx</button>
                        <button class="btn btn-dark"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</button>
                    </td>
                    <td class="d-none"><?php echo $report->user->Department; ?></td>
                    <td class="d-none"><?php echo $report->Actual_Participation; ?></td>
                    <td class="d-none"><?php echo $report->UserID; ?></td>
                    <td class="d-none"><?php echo $report->School_Year; ?></td>
                    <td class="d-none"><?php echo $report->Semester; ?></td>
                </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>