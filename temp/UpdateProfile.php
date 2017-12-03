<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Profile - OCES</title>
    <?php
        require '../partials/cssmetafiles.php';
    ?>
      <?php
        require '../partials/javascriptfiles.php';
      ?>
  </head>

  <body>
  <!-- HEADING -->
  <?php
      require '../partials/navigationbar.php';
  ?>  

  <!-- FORM -->
  <div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-user" aria-hidden="true"></i> Update Profile</h2>
    <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
      <form>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="employee id" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="first name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="middle name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="last name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-6"><input type="text" class="form-control" placeholder="hau username"></div>
              <div class="col-sm-6"><input type="text" class="form-control" placeholder="@hau.edu.ph" readonly></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="password">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="re-type password">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
              <div>
                  <select class="selectpicker"  id="btn_info" style="height: 37px">
                    <option selected disabled>Type</option>
                    <option>System Administrator</option>
                    <option>OCES Administrator</option>
                    <option>OCES Staff</option>
                    <option>CSCB Representative</option>
                    <option>University Administrator</option>
                    <optgroup label="Faculty">
                      <option>Full-Time Faculty</option>
                      <option>Part-Time Faculty</option>
                    </optgroup>
                    <optgroup label="Non-Teaching Personnel">
                      <option>Technical Support Services</option>
                      <option>Academic Support Services</option>
                      <option>Office Personnel</option>
                      <option>Field Personnel</option>
                    </optgroup>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DEPARTMENT</label>
            <div class="col-sm-10">
              <div>
                    <select class="selectpicker" id="btn_info" style="height: 37.5px; padding-bottom: 5px">
                      <option  selected disabled>Department</option>
                      <option>Basic Education</option>
                      <option>CCJEF</option>
                      <option>CICT</option>
                      <option>SAS</option>
                      <option>SBA</option>
                      <option>SEA</option>
                      <option>SED</option>
                      <option>SHTM</option>
                      <option>SNAMS</option>
                    </select>
                </div>        
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE OF EMPLOYMENT</label>
            <div class="col-sm-10">
              <div>
                  <select class="selectpicker btn_info" id="month" style="height: 37px"></select>
                  <select class="selectpicker btn_info" id="day" style="height: 37px"></select>
                  <select class="selectpicker btn_info" id="year" style="height: 37px"></select>                  
                </div>
            </div>
          </div>                   
      </form>
      <hr style="border: 1px solid #CFB53B"><br>
      <button type="submit" class="btn" id="btn_create">UPDATE PROFILE</button>
  </div>        

  </body>
  
  <!-- JAVASCRIPT -->
  <?php
      require 'script/scripts.php';
      require 'script/date_script.php';
  ?> 
</html>