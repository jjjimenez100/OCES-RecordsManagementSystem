<?php
	session_start();
	$server = "localhost";
	$dbUsername = "root";
	$dbPassword = "maindb123";
	$database = "dboces";

	$conn = new mysqli($server, $dbUsername, $dbPassword, $database);
	
	if ($conn->connect_error) 
	{
	die("Connect Failed:" . $conn->connect_error);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update User Account - OCES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='temp/htdocs/htdocs/js/jquery-3.2.1.min.js'></script>
    <script src='temp/htdocs/htdocs/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../resources/css/styles.css">
    <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css">
    <link rel="shortcut icon" href="../resources/images/oces.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
  <!-- HEADING -->
  <?php
      require 'NAV_SystemAdministrator.php';
  ?> 

  <!-- FORM -->
  <div class="container" style="padding-top: 50px; padding-bottom: 50px">
    <br>
    <h2 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> Update User Account</h2>
    <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
        <form method = "POST">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">EMPLOYEE ID</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-6"><input type="text" class="form-control" name = "search" placeholder="employee id"
					value = "<?php if(isset($_POST['search'])) { echo $_POST['search'];} ?>"></div>   <!-- RETAIN VALUE -->
					
              <div class="col-sm-5"><button type="submit" class="btn" name = "submit" id="btn_create" button onclick = "">SEARCH</button></div>
			  <?php
					$output = NULL;
					if(isset($_POST['submit']))
				{
					$search = $conn->real_escape_string($_POST['search']);
					
					// Query
					$resultSet = $conn->query("SELECT * FROM tbluser WHERE `UserID` = '$search'");
					if($resultSet->num_rows >0)
					{
						echo '<script language="javascript">';
						echo 'alert("User Exist")';
						echo '</script>';
						while($reportdata = $resultSet->fetch_array(MYSQLI_ASSOC))
				{
				?>
						<tr>
							<td><?php echo $reportdata['UserID'] ?></td>
							<td><?php echo $reportdata['First_Name'] ?></td>
							<td><?php echo $reportdata['Middle_Name'] ?></td>
							<td><?php echo $reportdata['Last_Name'] ?></td>
							<td><?php echo $reportdata['Position_Level'] ?></td>
							<td><?php echo $reportdata['Department'] ?></td>
							<td><?php 
									$str = $reportdata['Username'];
									echo substr($str, 0, strpos($str, '@'));
								?></td>
							<td><?php echo $reportdata['Password'] ?></td>
						</tr>
					<?php
				}
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("User does not exist")';
						echo '</script>';
					
					}
				
				}
					?>
		   </div>
          </div>
		 </form>
	
		 <?php echo $output; ?>
		 
		  <form method = "POST" action="">
          <hr noshade="noshade" style="border: 1px solid #CFB53B"><br>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">FIRST NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "first_name" placeholder="first name" value ="
			  <?php 
					if(isset($_POST['submit']))
					{
						$resultSet = $conn->query("SELECT `First_Name` from tbluser WHERE `UserID` = '$search'");
						$reportdata = $resultSet->fetch_array(MYSQLI_ASSOC);
						echo $reportdata['First_Name'];
					}
			  ?>
			  ">
			  
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">MIDDLE NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "middle_name" placeholder="middle name" value = "
				<?php
					if(isset($_POST['submit']))
					{
						$resultSet = $conn->query("SELECT `Middle_Name` from tbluser WHERE `UserID` = '$search'");
						$reportdata = $resultSet->fetch_array(MYSQLI_ASSOC);
						echo $reportdata['Middle_Name'];
					}
				?>
			  ">
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">LAST NAME</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "last_name" placeholder="last name" value ="
			  <?php
					if(isset($_POST['submit']))
					{
						$resultSet = $conn->query("SELECT `Last_Name` from tbluser WHERE `UserID` = '$search'");
						$reportdata = $resultSet->fetch_array(MYSQLI_ASSOC);
						echo $reportdata['Last_Name'];
						
					}
			  ?>
			  ">
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">HAU EMAIL</label>
            <div class="col-sm-10 form-group row">
              <div class="col-sm-6"><input type="text" class="form-control" name = "email" placeholder="hau username" value="
			  <?php
					if(isset($_POST['submit']))
					{
						$resultSet = $conn->query("SELECT `Username` from tbluser WHERE `UserID` = '$search'");
						$reportdata = $resultSet->fetch_array(MYSQLI_ASSOC);
						$str = $reportdata['Username'];
						echo substr($str, 0, strpos($str, '@'));
					}
			  ?>
			  "></div>
              <div class="col-sm-6"><input type="text" class="form-control" placeholder="@hau.edu.ph" readonly></div>
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name = "password" placeholder="password" value ="
			  <?php
					if(isset($_POST['submit']))
					{
						$resultSet = $conn->query("SELECT `Password` from tbluser WHERE `UserID` = '$search'");
						$reportdata = $resultSet->fetch_array(MYSQLI_ASSOC);
						echo $reportdata['Password'];
						
					}
			  ?>
			  ">
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">RE-TYPE PASSWORD</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name = "reapassword" placeholder="re-type password">
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ACCOUNT TYPE</label>
            <div class="col-sm-10">
              <div>
                  <select class="selectpicker"  id="btn_info" name = "accountType" style="height: 37px">
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
                    <select class="selectpicker" id="btn_info" style="height: 37.5px; padding-bottom: 5px" name = "department">
                      <option value="" selected disabled>Department</option>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM tbldepartment");

                        while ($row = $sql->fetch_assoc())
                        {
                          echo "<option>" . $row['Department'] . "</option>";
                        }
                      ?>  
                    </select>
                </div>        
            </div>
          </div> 
		  
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">DATE OF EMPLOYMENT</label>
            <div class="col-sm-10">
              <div>
                  <select class="selectpicker btn_info" name = "month" id="month" style="height: 37px"></select>
                  <select class="selectpicker btn_info" name = "day" id="day" style="height: 37px"></select>
                  <select class="selectpicker btn_info" name = "year" id="year" style="height: 37px"></select>                  
                </div>
            </div>
          </div>  
		  
		</form>
	  
      <hr style="border: 1px solid #CFB53B"><br>
      <button type="submit" class="btn" name = "update" name = "updateButton" id="btn_create">UPDATE ACCOUNT</button>
  </div>   
  </body>
  
  <!-- JAVASCRIPT -->
  <?php
      require 'script/scripts.php';
      require 'script/date_script.php';
  ?> 
</html>