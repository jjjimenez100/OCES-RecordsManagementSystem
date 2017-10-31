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
<p class="lead text-center"><i class="fa fa-search" aria-hidden="true"></i> Filter data within a certain date range:</p>
<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-2">
        <input type="date" class="form-control" id="from" name="from">
    </div>
    <div class="form-group col-md-2">
        <input type="date" class="form-control" id="to">
    </div>
    <div class="col-md-4"></div>
</div>
<table class="table table-striped table-hover table-sm" id="tblReports">
    <thead class="table-dark">
    <tr class="text-center">
        <th class="text-center">#</th>
        <th class="text-center">Report Name</th>
        <th class="text-center">Participation</th>
        <th class="text-center">Venue</th>
        <th class="text-center">Date</th>
        <th class="text-center">Objectives</th>
        <th class="text-center">Beneficiaries</th>
        <th class="text-center">Proponents</th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <th scope="row">1</th>
        <td style="word-break: break-all;">asgasgashgahashahsa asgasgashgahashahsa</td>
        <td>Sinong</td>
        <td>Di mawiwili</td>
        <td>Dahil sa</td>
        <td>game na to</td>
        <td>ay di ka</td>
        <td>magsisisi</td>
        <td class="text-center" style="vertical-align: middle;">
            <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approve</button>
            <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
        </td>
    </tr>
    <tr>
        <th scope="row">1</th>
        <td>wowowee</td>
        <td>Sinong</td>
        <td>Di mawiwili</td>
        <td>Dahil sa</td>
        <td>game na to</td>
        <td>ay di ka</td>
        <td>magsisisi</td>
        <td class="text-center">
            <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approve</button>
            <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
        </td>
    </tr>
    <tr>
        <th scope="row">1</th>
        <td>Wowowee</td>
        <td>Sinong</td>
        <td>Di mawiwili</td>
        <td>Dahil sa</td>
        <td>game na to</td>
        <td>ay di ka</td>
        <td>magsisisi</td>
        <td class="text-center">
            <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approve</button>
            <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
        </td>
    </tr>
    </tbody>
</table>

</body>

<?php
require 'partials/scripts.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tblReports').DataTable();
    });
</script>
</html>