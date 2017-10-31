<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create Report - OCES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles.css">
    <link type="text/css" rel="stylesheet" href="resources/css/styles2.css">
    <link rel="shortcut icon" href="resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>
  <!-- HEADING -->
  <?php
      require 'partials/navs/NAV_OCESAdministrator.php';
  ?> 

  <!-- FORM -->
  <div class="container" id="form_padding">
    <h2>Create Report</h2>
    <hr style="border: 1px solid #CFB53B"><br>
      <form>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACTIVITY TITLE</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="activity title">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PROPONENTS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="proponents">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">BENEFICIARIES</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="beneficiaries">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOMPLISHED OBJECTIVES</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" placeholder="accomplished objectives"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-10">
              <div>
                  <select class="selectpicker btn_info" id="month" style="height: 37px"></select>
                  <select class="selectpicker btn_info" id="day" style="height: 37px"></select>
                  <select class="selectpicker btn_info" id="year" style="height: 37px"></select>                  
                </div>
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">VENUE</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="venue">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">TIME IMPLEMENTED</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="time implemented">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">BRIEF NARRATIVE</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" placeholder="brief narrative"></textarea>
            </div>
          </div>          
          <hr style="border: 1px solid #CFB53B"><br>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">LIST OF VOLUNTEERS</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-7"><input type="text" class="form-control" placeholder="employee id"></div>
              <div class="col-sm-3"><button type="submit" class="btn" id="btn_create">SEARCH</button></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-7"><input type="text" class="form-control" placeholder="employee name" readonly></div>      
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nature of Participation</label>
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
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-3"><button type="submit" class="btn" id="btn_create">ADD</button></div>
                       
          </div> 
          <div id="no-more-tables">
            <table class="table table-hover">
              <thead class="thead-inverse cf">
                <tr>
                  <th>EMPLOYEE ID</th>
                  <th>NAME OF VOLUNTEER</th>
                  <th>GROUP</th>
                  <th>PARTICIPATION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-title="EMPLOYEE ID.">10000000</td>
                  <td data-title="NAME OF VOLUNTEER">Lloyd Ivan I. Escoto</td>
                  <td data-title="GROUP">A</td>
                  <td data-title="PARTICIPATION">Conceptualization</td>
                </tr>
                <tr>
                  <td data-title="EMPLOYEE ID.">10000001</td>
                  <td data-title="NAME OF VOLUNTEER">John Joshua Jimenez</td>
                  <td data-title="GROUP">B</td>
                  <td data-title="PARTICIPATION">Lecturer</td>
                </tr>
                <tr>
                  <td data-title="EMPLOYEE ID.">10000002</td>
                  <td data-title="NAME OF VOLUNTEER">Ariane D. Nulud</td>
                  <td data-title="GROUP">C</td>
                  <td data-title="PARTICIPATION">Assistance in Community Organizing Needs Assessment</td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr style="border: 1px solid #CFB53B"><br> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACTUAL PARTICIPATION / COUNTERPART OF THE PARTNER COMMUNITY SERVED</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" placeholder="served community participation"></textarea>
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PROGRAM OF ACTIVITIES</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-7"><input type="text" class="form-control" placeholder="file name" readonly></div>
              <div class="col-sm-3"><button type="submit" class="btn" id="btn_create">CHOOSE FILE</button></div>
            </div>
          </div>               
      </form>
      <hr style="border: 1px solid #CFB53B"><br>
      <button type="submit" class="btn" id="btn_create">GENERATE REPORT</button>
  </div>        

  </body>
  
  <!-- JAVASCRIPT -->
  <?php
      require 'partials/scripts.php';
      require 'resources/js/date_script.php';
      require 'resources/js/participation_script.php';
  ?>
</html>