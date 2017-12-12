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

<div id="modalValidDate" name="modalNotBlank" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Reminder</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Please select a valid date.</p>
      </div>
    </div>
  </div>
</div>

<div id="modalSuccessUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Success</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
        <p>Updated user account!</p>
      </div>
    </div>
  </div>
</div>

<div id="modalErrorUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Error</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
          <span id="errorUpdate"></span>
      </div>
    </div>
  </div>
</div>

<div id="modalErrorSearch" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Error</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>  
      <div class="modal-body">
          User does not exist.
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
        <p>Do you want to proceed with updating this account?</p>
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

<div id="myModalProfile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>   
      </div>
      <div style="background-color: #CFB53B; height: 5px"></div>       
      <div class="modal-body">
        <p>Do you want to proceed with updating your profile?</p>
        <p><b>Name:</b> <span id="firstp" style="text-transform: capitalize;"></span> <span id="middlep" style="text-transform: capitalize;"></span> <span id="lastp" style="text-transform: capitalize;"></span></p>
        <p><b>Email:</b> <span id="userp"></span>@hau.edu.ph</p>
        <p><b>Password:</b> <span id="passp"></span></p>
        <p><b>Department:</b> <span id="departmentp"></span></p>
        <p><b>Date of Employment:</b> <span id="mmp"></span>-<span id="ddp"></span>-<span id="yyyyp"></span></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn_proceed" id="btn_create">Proceed</button>
        <button class="btn" id="btn_create" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>