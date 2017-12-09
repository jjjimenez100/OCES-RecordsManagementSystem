<?php
	session_start();
	require '../../config/DatabaseConnection.php' ;

	$activityTitle = $_POST['activityTitle'];
	$proponents = $_POST['proponents'];
	$beneficiaries = $_POST['beneficiaries'];
	$accomplishedObjectives = $_POST['accomplishedObjectives'];
	$month = $_POST['monthSelected'];
	$day = $_POST['daySelected'];
	$year = $_POST['yearSelected'];
	$date = $year . '-' . $month . '-' . $day;
	$venue = $_POST['venue'];
	$time = $_POST['timeImplemented'];
	$dvt = $date . ', ' . $venue . ' ' . $time;
	$briefNarrative = $_POST['briefNarrative'];
	$volunteers = $_POST['volunteers'];
	$volunteersid = $_POST['volunteersid'];
	$positions = $_POST['positions'];
	$participations = $_POST['participations'];
	$groups = $_POST['groups'];
	$servedCommunity = $_POST['servedCommunity'];
	$particulars = $_POST['particulars'];
	$amounts = $_POST['amounts'];
	$timestart = $_POST['timestart'];
	$timeend = $_POST['timeend'];
	$activity = $_POST['activity'];
	$person = $_POST['person'];
	$schoolYear = "2017-2018";
	$semester = "2nd Semester";
	$remarks = "Pending";

	$stmt = $connect->prepare("INSERT INTO tblreports (UserID, Activity_Title, Proponents, Beneficiaries, Accomplished_Objectives, Date, Venue, Time_Implemented, Brief_Narrative, Actual_Participation, School_Year, Semester, Remarks) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("issssssssssss",$_SESSION['userid'],$activityTitle,$proponents,$beneficiaries,$accomplishedObjectives,$date,$venue,$time,$briefNarrative,$servedCommunity,$schoolYear,$semester,$remarks);
	if($stmt->execute())
	{
		$stmt->close();
		$stmt2 = $connect->prepare("SELECT * FROM tblreports ORDER BY Activity_Code DESC LIMIT 1");
		if($stmt2->execute())
		{
			$stmt2->bind_result($code,$user,$title,$propo,$bene,$acOb,$d,$v,$ti,$bn,$ap,$sy,$s,$r);
			$stmt2->fetch();
			$stmt2->close();
			for($i = 0;$i < count($volunteers);$i++)
			{
				$stmt3 = $connect->prepare("INSERT INTO tblvolunteers(Category,Participation,Groups,UserID,Activity_Code) VALUES (?,?,?,?,?)");
				$stmt3->bind_param("sssii",$positions[$i],$participations[$i],$groups[$i],$volunteersid[$i],$code);
				$stmt3->execute();
			}
			$stmt3->close();
			for($i = 0;$i < count($activity);$i++)
			{
				$stmt4 = $connect->prepare("INSERT INTO tblprograms(TimeStart,TimeEnd,Activity,PersonsResponsible,Activity_Code) VALUES (?,?,?,?,?)");
				$stmt4->bind_param("ssssi",$timestart[$i],$timeend[$i],$activity[$i],$person[$i],$code);
				$stmt4->execute();			
			}
			$stmt4->close();
			for($i = 0;$i < count($particulars);$i++)
			{
				$stmt5 = $connect->prepare("INSERT INTO tblfinance(Particulars,Amount,Activity_Code) VALUES (?,?,?)");
				$stmt5->bind_param("ssi",$particulars[$i],$amounts[$i],$code);
				$stmt5->execute();
			}
			$stmt5->close();
		}
	}
	

?>