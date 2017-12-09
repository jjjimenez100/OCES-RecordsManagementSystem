<?php
	require '../../config/DatabaseConnection.php' ;
	
	$id = $_POST['empId'];
	
	$stmt = $connect->prepare("SELECT * FROM tbluser WHERE UserID = ?");
	$stmt->bind_param("i",$id);
	if($stmt->execute())
	{
		$result = $stmt->get_result();
		$data = $result->fetch_array(MYSQLI_ASSOC);
		echo json_encode($data);
	}
?>