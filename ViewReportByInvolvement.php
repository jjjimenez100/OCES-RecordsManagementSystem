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
        require 'resources/js/viewreport_script.php';
    ?>

</div>

</body>

<?php
    require 'partials/scripts.php';
    require 'resources/js/participation_script.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $(function () {
            let popovers = $('[data-toggle="popover"]');
            popovers.popover();
            popovers.on('click', function(event){
                popovers.not(this).popover('hide');
            });
        });

        $('#tblReports').DataTable({
            initComplete: function () {
                let column = this.api().column(7);
                $('#participation').on('change', function (){
                    let val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column.search( val ? '^'+val+'$' : '', true, false ).draw();
                });
            }
        });
    });
</script>
</html>