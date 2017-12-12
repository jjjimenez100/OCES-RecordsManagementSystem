<?php
    require '../middleware/RoleMiddleware.php';
    if($roleChecker->hasCreateReportAccess() == false){
        $roleChecker->redirectUser();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create Report - OCES</title>
      <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
      <?php
        require '../partials/cssmetafiles.php' ;
        require '../partials/javascriptfiles.php' ;
      ?>
    <script type="text/javascript" src="CreateReportAPI/create-report.js"></script>
  </head>

  <body>
  <!-- HEADING -->
  <?php
      require '../partials/navigationbar.php';
  ?> 

  <!-- FORM -->
  <div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create Report</h2>
    <hr style="border: 1px solid #CFB53B"><br>
	<form name="descriptForm">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACTIVITY TITLE</label>
            <div class="col-sm-10">
              <input name="activityTitle" type="text" class="form-control" placeholder="activity title">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PROPONENTS</label>
            <div class="col-sm-10">
              <input name="proponents" type="text" class="form-control" placeholder="proponents">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">BENEFICIARIES</label>
            <div class="col-sm-10">
              <input name="beneficiaries" type="text" class="form-control" placeholder="beneficiaries">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOMPLISHED OBJECTIVES</label>
            <div class="col-sm-10">
              <textarea name="accomplishedObjectives" class="form-control" rows="5" placeholder="accomplished objectives"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-10">
              <div>
                  <select name="monthSelected" class="selectpicker btn_info" id="month" style="height: 37px" onchange="configureDateDropDown(this, document.getElementById('day'))"></select>
                  <select name="daySelected" class="selectpicker btn_info" id="day" style="height: 37px"></select>
                  <select name="yearSelected" class="selectpicker btn_info" id="year" style="height: 37px"></select>                  
                </div>
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">VENUE</label>
            <div class="col-sm-10">
              <input name="venue" type="text" class="form-control" placeholder="venue">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">TIME IMPLEMENTED</label>
            <div class="col-sm-10">
              <input name="timeImplemented" type="text" class="form-control" placeholder="time implemented">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">BRIEF NARRATIVE</label>
            <div class="col-sm-10">
              <textarea name="briefNarrative" class="form-control" rows="5" placeholder="brief narrative"></textarea>
            </div>
          </div>
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <select class="selectpicker btn_info" id="semester" name="semester" style="height: 37px; max-width: 355px">
                    <option selected disabled>Select Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select class="selectpicker btn_info" id="schoolYear" name="schoolYear" style="height: 37px; max-width: 355px">
                    <option selected disabled>Select School Year</option>
                    <?php
                    for($counter=1950; $counter<=date("Y"); $counter++){
                        if(isset($selectedUser) && $counter == $explodedDate[0]){
                            echo '<option value = "'.$counter.'"selected>'.$counter.'</option>';
                        }
                        else{
                            echo '<option value = "'.$counter.'">'.$counter.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
			</form>
          <hr style="border: 1px solid #CFB53B"><br>
		  <div id="searchVolun"></div>
          <label><b>LIST OF VOLUNTEERS</b></label>
			  <form name="searchForm">
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Employee ID</label>
					<div class="col-sm-10 form-group row">
					  <div class="col-sm-7"><input name="empId" type="number" class="form-control" placeholder="employee id"></div>
			  </form>				  
			  <div class="col-sm-3"><button name="searchEmpButton" type="submit" class="btn" id="btn_create">SEARCH</button></div>
					</div>
				  </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-7"><input name="empName" type="text" class="form-control" placeholder="employee name" readonly></div>
			  <div class="col-sm-7"><input name="empPos" type="text" class="form-control" placeholder="employee position" readonly></div>			  
            </div>
          </div>
		  <form name="natureParticipation">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nature of Participation</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-2">
                <select class="selectpicker btn_info"  id="group" style="height: 37px">
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
		  </form>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-3"><button name="addVolunteer" type="submit" class="btn" id="btn_create">ADD VOLUNTEER</button></div>                      
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
              <tbody id="volunTable">
              </tbody>
            </table>
          </div>
          <hr style="border: 1px solid #CFB53B"><br> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACTUAL PARTICIPATION / COUNTERPART OF THE PARTNER COMMUNITY SERVED</label>
            <div class="col-sm-10">
              <textarea name="servedCommunity" class="form-control" rows="5" placeholder="served community participation"></textarea>
            </div>
          </div> 
          <hr style="border: 1px solid #CFB53B"><br> 
		  <div id="progActivitiesAlert"></div>
          <label><b>PROGRAM OF ACTIVITIES</b></label>
          <div class="form-group row">            
            <label class="col-sm-2 col-form-label">Time Start</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-3"><input name="timeStart" type="text" class="form-control" placeholder="time start"></div>
              <label class="col-sm-2">Time End</label>
              <div class="col-sm-3"><input name="timeEnd" type="text" class="form-control" placeholder="time end"></div>
            </div>
            <label class="col-sm-2 col-form-label">Activity</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-9"><input name="actName" type="text" class="form-control" placeholder="activity"></div>
            </div>
            <label class="col-sm-2 col-form-label">Person(s) Responsible</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-9"><input name="perRespon" type="text" class="form-control" placeholder="person(s) responsible"></div>
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-3"><button name="addActivity" type="submit" class="btn" id="btn_create">ADD ACTIVITY</button></div>                      
          </div>
          <div id="no-more-tables">
            <table class="table table-hover">
              <thead class="thead-inverse cf">
                <tr>
                  <th>TIME START</th>
                  <th>TIME END</th>
                  <th>ACTIVITY</th>
                  <th>PERSON(S) RESPONSIBLE</th>
                </tr>
              </thead>
              <tbody id="progActivities">
              </tbody>
            </table>
          </div> 
          <hr style="border: 1px solid #CFB53B"><br> 
		  <div id="financeReportAlert"></div>
          <label><b>FINANCIAL REPORT</b></label>
          <div class="form-group row">    
            <label class="col-sm-2 col-form-label">Particulars</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-9"><input name="financeParticulars" type="text" class="form-control" placeholder="particulars"></div>
            </div>
            <label class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-9"><input name="financeAmount" type="number" class="form-control" placeholder="amount"></div>
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-3"><button name="addExpense" type="submit" class="btn" id="btn_create">ADD EXPENSE</button></div>
                       
          </div>
          <div id="no-more-tables">
            <table class="table table-hover">
              <thead class="thead-inverse cf">
                <tr>
                  <th>PARTICULARS</th>
                  <th class="text-center">AMOUNT</th>
                </tr>
              </thead>
              <tbody id="financialTable">
              </tbody>
              <tfoot>
                <tr>
                  <td data-title="TOTAL">TOTAL</td>
                  <td name="total" data-title="AMOUNT" class="text-right"></td>
                </tr>
              </tfoot>
            </table>
          </div>             
      <hr style="border: 1px solid #CFB53B"><br>
	<div class="form-group row">
		  <div class="col-sm-4">
                <select class="selectpicker btn_info" id="department" name="department" style="height: 37px; max-width: 355px">
                  <option selected disabled>Select Department</option>
				  <?php
					//session_start();
					require '../config/DatabaseConnection.php' ;
					$stmt = $connect->prepare("SELECT * FROM tbldepartment");
					$stmt->execute();
					$result = $stmt->get_result();
					while($row = $result->fetch_array(MYSQLI_ASSOC))
					{
						?>
						<option><?php echo $row['Department']; ?></option>
						<?php
					}
				  ?>
                </select>                
           </div>
		   <div class="col-sm-5">
                <select class="selectpicker btn_info" id="courses" name="courses" style="height: 37px; max-width: 355px">
                  <option selected disabled>Select Courses</option>
                </select>                
              </div>
	</div>

  <br><hr style="border: 1px solid #CFB53B"><br>


	  <div id="alert"></div>
      <center><button name="generateReport" type="submit" class="btn" id="btn_create">GENERATE REPORT</button></center>


  </body>
  
  <!-- JAVASCRIPT -->
  <?php
      require '../partials/date_script.php';
      require '../partials/participation_script.php';
  ?>
</html>