<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Reports</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
    <link rel="shortcut icon" href="resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
</head>
<body>
<?php
    require 'partials/navs/NAV_Faculty_NTP.php';
?>
<br>
<h1 class="text-center" style="padding-top: 50px"><i class="fa fa-file-text" aria-hidden="true"></i> View Reports</h1>
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
<table class="table table-responsive table-striped table-hover table-sm" id="tblReports">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Wowowin Wowowin</th>
            <th>Wowowin</th>
            <th>Wowowin Wowowin</th>
            <th>Wowowin</th>
            <th>Wowowin Wowowin</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Wowowin Wowowin</th>
        <th>Wowowin</th>
        <th>Wowowin Wowowin</th>
        <th>Wowowin</th>
        <th>Wowowin Wowowin</th>
    </tr>
    </tfoot>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>ss</td>
        <td>fshs</td>
        <td>@asfgasga</td>
        <td>asg</td>
        <td>@asgas</td>
        <td class="text-center">
            <button class="btn btn-dark"><i class="fa fa-download" aria-hidden="true"></i> .docx</button>
            <button class="btn btn-dark"><i class="fa fa-download" aria-hidden="true"></i> PDF</button>
        </td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>ss</td>
        <td>fshs</td>
        <td>@asgasga</td>
        <td>sdgsdhsd</td>
        <td>@sdfsd</td>
        <td class="text-center">
            <button class="btn btn-dark"><i class="fa fa-download" aria-hidden="true"></i> .docx</button>
            <button class="btn btn-dark"><i class="fa fa-download" aria-hidden="true"></i> PDF</button>
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
        $('#tblReports').DataTable()
    });
</script>
</html>