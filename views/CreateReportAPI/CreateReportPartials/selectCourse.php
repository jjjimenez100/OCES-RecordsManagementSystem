<?php
    require '../../../config/DatabaseConnection.php' ;
	
	$department = $_POST["department"];
	$departArray = [];
	$stmt = $connect->prepare("SELECT * FROM tblcourses WHERE Department = ?");
	$stmt->bind_param("s",$department);
	if($stmt->execute())
	{
		$result = $stmt->get_result();
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			array_push($departArray, [
				'course' => $row['Course'],
				'department' => $row['Department']		
			]);
		}
		echo json_encode($departArray);
	}

?>