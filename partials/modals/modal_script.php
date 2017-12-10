<!-- Incorrect Login Credentials -->
<div id="modalIncorrect" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Reminder</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Incorrect login credentials.</p>
      </div>
    </div>
  </div>
</div>

<!-- Creating New Account -->
<div id="modalNotMatch" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Reminder</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Passwords do not match.</p>
      </div>
    </div>
  </div>
</div>

<div id="modalNotBlank" name="modalNotBlank" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Reminder</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Please fill in all the ask information.</p>
      </div>
    </div>
  </div>
</div>

<div id="modalSuccess" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Success</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Created new account!</p>
      </div>
    </div>
  </div>
</div>

<div id="modalError" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Error</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
          <span id="errorSignup"></span>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>       
      <div class="modal-body">
        <p>Do you want to proceed with creating this account?</p>
        <p><b>Employee No.:</b> <span id="empid"></span></p>
        <p><b>Name:</b> <span id="first" style="text-transform: capitalize;"></span> <span id="middle" style="text-transform: capitalize;"></span> <span id="last" style="text-transform: capitalize;"></span></p>
        <p><b>Email:</b> <span id="user"></span>@hau.edu.ph</p>
        <p><b>Password:</b> <span id="pass"></span></p>
        <p><b>Account Type:</b> <span id="acctype"></span></p>
        <p><b>Department:</b> <span id="department"></span></p>
        <p><b>Date of Employment:</b> <span id="mm"></span>-<span id="dd"></span>-<span id="yyyy"></span></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn_proceed" id="btn_create">Proceed</button>
        <button class="btn" id="btn_create" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- Adding New Department -->
<div id="modalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Do you want to proceed with adding <b><?php echo $_POST['newdept']; ?></b>?</p>
      </div>
      <div class="modal-footer">
        <button name="proceed" class="btn" id="btn_create" value="add">Proceed</button>
        <button type="button" class="btn" id="btn_create" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
<?php 
  require dirname(__FILE__).'/../department/AddDepartment.php';
?>
</div>

<!-- Editing Existing Department -->
<div id="modalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Do you want to proceed with editing 
          <b><?php echo $_POST['existdept']; ?></b> to <b><?php echo $_POST['newdept']; ?></b>?
        </p>
      </div>
      <div class="modal-footer">
        <button name="proceed" class="btn" id="btn_create" value="edit">Proceed</button>
        <button type="button" class="btn" id="btn_create" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
<?php
require dirname(__FILE__).'/../department/EditDepartment.php';
?>
</div>


<div id="modalEnter" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Reminder</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Please enter the new department.</p>
      </div>
    </div>
  </div>
</div>

<div id="modalSuccessAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Success</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Added new department!</p>
      </div>
    </div>
  </div>
</div>

<div id="modalErrorAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Error</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Department already exists.</p>
      </div>
    </div>
  </div>
</div>

<div id="modalSelect" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Reminder</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Please select the department to be edited and enter the new one.</p>
      </div>
    </div>
  </div>
</div>

<div id="modalSuccessEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Success</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Edited the department!</p>
      </div>
    </div>
  </div>
</div>

<div id="modalErrorEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Error</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Department already exists.</p>
      </div>
    </div>
  </div>
</div>