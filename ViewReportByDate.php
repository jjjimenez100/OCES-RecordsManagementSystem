<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Reports - OCES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles2.css">
    <link rel="shortcut icon" href="resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
</head>
<body>
<?php
require 'partials/navs/NAV_OCESAdministrator.php';
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
                <input type="date" class="form-control" id="from" name="from">
            </div>         
        </div>
    </div>
    <hr style="border: 1px solid #CFB53B"><br>
    
    <?php
        require 'resources/js/viewreport_script.php';
    ?>

</div>


</body>

<?php
    require 'partials/scripts.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script>
    const SEMESTERS_PER_YR = 2;
    let fromSchoolYear = selectorFactory("from_year");
    let toSchoolYear = selectorFactory("to_year");
    let semesterFilter = selectorFactory("semester");

    $(document).ready(function() {
        $('#tblReports').DataTable();
        populateComboBox(fromSchoolYear, new Date().getFullYear(), 1950, "From School Year");
        populateComboBox(toSchoolYear, new Date().getFullYear(), 1950, "To School Year");
        populateComboBox(semesterFilter, SEMESTERS_PER_YR, 1, "Semester");
    });

    function selectorFactory(identifier){
        return (document.getElementById(identifier) === null) ?
            document.getElementsByClassName(identifier)
            : document.getElementById(identifier);
    }

    function populateComboBox(selector, start, end, label){
        selector.innerHTML += `<option selected disabled>${label}</option>`;
        //selector.innerHTML += '<option selected disabled>'+ label +'</option>';
        for(let counter = start; counter >= end; counter--){
            //selector.innerHTML += '<option>' + counter + '</option>'
            selector.innerHTML += `<option>${counter}</option>`;
        }
    }

</script>
</html>