<?php
	session_start();
	require 'fpdf/pdf.php';
	require '../../../vendor/autoload.php';
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	require '../../../config/DatabaseConnection.php' ;

	function generateReport($title,$propo,$beneficiary,$accompObj,$m,$d,$y,$ven,$timeImple,$briefNarra,
	$volun,$pos,$partici,$group,$served,$timeS,$timeE,$act,$per,$particu,$amount,$totalAmount,$user,$posLevel,$depart,$course) 
	{
		//PDF FILE
		$activityTitle = $title;
		$proponents = $propo;
		$beneficiaries = $beneficiary;
		$accomplishedObjectives = $accompObj;
		$month = $m;
		$day = $d;
		$year = $y;
		$date = $month . '/' . $day . '/' . $year;
		$venue = $ven;
		$time = $timeImple;
		$dvt = $date . ', ' . $venue . ' ' . $time;
		$briefNarrative = $briefNarra;
		$pdfName = $activityTitle . '.pdf';
		$excelName = $activityTitle . '.xlsx';
		$course = $course;
		$department = $depart;
		$university = 'Holy Angel University';
		$report = 'COMMUNITY EXTENSION SERVICE ACTIVITY REPORT';
		$city = 'Angeles City';
		$descriptions = array($activityTitle,$proponents,$beneficiaries,$accomplishedObjectives,$dvt,$briefNarrative);
		$descriptionsTitle = array('Activity Title:','Proponent(s):','Beneficiaries:','Accomplished Objectives:','Date/Venue/Time Implemented:','Brief Narrative:');
		$pdf = new PDF();
		$pdf->SetFont('Arial','',12);
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(true);
		$pdf->Title($course);
		$pdf->Title($department);
		$pdf->Title($university);
		$pdf->Title($city);
		$pdf->Ln(7);
		$pdf->Title($report);
		$pdf->Ln(7);
		$pdf->SetFont('Arial','',12);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$index = 0;
		foreach($descriptions as $info)
		{
			$pdf->SetXY($x+20,$y);
			$pdf->MultiCell(40,10, $descriptionsTitle[$index], 0, 1);
			$pdf->SetXY($x+60,$y);
			$pdf->MultiCell(120,10, $info, 0);
			$pdf->Ln();
			$y = $pdf->GetY();
			$index++;
		}		
		$volunTitle = 'List of Actual Volunteers and Type of Participation:';
		$servedComTitle = 'Actual Participation/Counterpart of the Partner Community Served:';
		$progActTitle = 'Program of Activities';
		$financeRepTitle = 'Financial Report:';
		$volunteers = $volun;
		$positions = $pos;
		$participations = $partici;
		$groups = $group;
		$servedCommunity = $served;
		$volunHeader = array('Name of Volunteer', 'Position/Designation', 'Type of Participation', 'Group');
		$progActHeader = array('Time Start', 'Time End', 'Activity', 'Person(s) Responsible');
		$financeRepHeader = array('Particulars', 'Amount');
		$particulars = $particu;
		$amounts = $amount;
		$total = $totalAmount;
		$financeFinalRow = array('TOTAL', $total);
		$pdf->AddPage();
		$pdf->Title($volunTitle);
		$pdf->Ln();
		$pdf->SetWidths(array(60,50,60,20));
		$pdf->Row($volunHeader);
		for($i = 0;$i < count($volunteers);$i++)
		{
			$volunTable = array($volunteers[$i],$positions[$i],$participations[$i],$groups[$i]);
			$pdf->Row($volunTable);
		}
		$pdf->Ln();
		$pdf->Title($servedComTitle);
		$pdf->Ln();
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->SetXY($x,$y);
		$pdf->MultiCell(180,10, $servedCommunity, 0, 1);
		$pdf->Title($progActTitle);
		$pdf->Ln();
		$timestart = $timeS;
		$timeend = $timeE;
		$activity = $act;
		$person = $per;
		$pdf->SetWidths(array(30,30,80,50));
		$pdf->Row($progActHeader);
		for($i = 0;$i < count($activity);$i++)
		{
			$progActTable = array($timestart[$i],$timeend[$i],$activity[$i],$person[$i]);
			$pdf->Row($progActTable);
		}
		$pdf->Ln();
		$pdf->Title($financeRepTitle);
		$pdf->Ln();
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->SetXY($x+20,$y);
		$pdf->SetWidths(array(100,50));
		$pdf->Row($financeRepHeader);
		for($i = 0;$i < count($particulars);$i++)
		{
			$x = $pdf->GetX();
			$pdf->SetX($x+20);
			$financeRepTable = array($particulars[$i],$amounts[$i]);
			$pdf->Row($financeRepTable);
		}
        $x = $pdf->GetX();
        $pdf->SetX($x+20);
        $pdf->Row($financeFinalRow);
        $preparedByTitle = 'Prepared By:';
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SideTitle($preparedByTitle);
        $pdf->SideTitle($user);
        $pdf->SideTitle($posLevel);
        $pdf->Ln();
		$pdf->Output('F' , dirname(__FILE__).'/../../../storage/'.$pdfName);
		
		//EXCEL FILE
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('B1', $course);
        $sheet->setCellValue('B2', $depart);
        $sheet->setCellValue('B3', $university);
        $sheet->setCellValue('B4', $city);
        $sheet->setCellValue('B6', $report);
        $columnDescriptionsTitle = array_chunk($descriptionsTitle,1);
        $columnDescriptions = array_chunk($descriptions, 1);
        $sheet->fromArray($columnDescriptionsTitle,NULL,'A8');
        $sheet->fromArray($columnDescriptions,NULL,'F8');
        $sheet->setCellValue('A15', 'Name of Volunteer');
        $sheet->setCellValue('D15', 'Position/Designation');
        $sheet->setCellValue('G15', 'Type of Participation');
        $sheet->setCellValue('J15', 'Group');
        $highestRow = $sheet->getHighestRow();
        $highestRow += 1;
        $nextRow = 'A' . $highestRow;
        $columnVolunteer = array_chunk($volunteers, 1);
        $columnPositions = array_chunk($positions, 1);
        $columnParticipations = array_chunk($participations, 1);
        $columnGroups = array_chunk($groups, 1);
        $sheet->fromArray($columnVolunteer,NULL,$nextRow);
        $nextRow = 'D' . $highestRow;
        $sheet->fromArray($columnPositions,NULL,$nextRow);
        $nextRow = 'G' . $highestRow;
        $sheet->fromArray($columnParticipations,NULL,$nextRow);
        $nextRow = 'J' . $highestRow;
        $sheet->fromArray($columnGroups,NULL,$nextRow);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 2;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, $servedComTitle);
        $nextRow = 'I' . $highestRow;
        $sheet->setCellValue($nextRow, $servedCommunity);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 2;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, 'Time Start');
        $nextRow = 'C' . $highestRow;
        $sheet->setCellValue($nextRow, 'Time End');
        $nextRow = 'F' . $highestRow;
        $sheet->setCellValue($nextRow, 'Activity');
        $nextRow = 'H' . $highestRow;
        $sheet->setCellValue($nextRow, 'Person(s) Responsible');
        $columnTimestart = array_chunk($timestart, 1);
        $columnTimeend = array_chunk($timeend, 1);
        $columnActivity = array_chunk($activity, 1);
        $columnPerson = array_chunk($person, 1);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 1;
        $nextRow = 'A' . $highestRow;
        $sheet->fromArray($columnTimestart,NULL,$nextRow);
        $nextRow = 'C' . $highestRow;
        $sheet->fromArray($columnTimeend,NULL,$nextRow);
        $nextRow = 'F' . $highestRow;
        $sheet->fromArray($columnActivity,NULL,$nextRow);
        $nextRow = 'H' . $highestRow;
        $sheet->fromArray($columnPerson,NULL,$nextRow);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 2;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, 'Particulars');
        $nextRow = 'C' . $highestRow;
        $sheet->setCellValue($nextRow, 'Amounts');
        $columnParticulars = array_chunk($particulars, 1);
        $columnAmounts = array_chunk($amounts, 1);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 1;
        $nextRow = 'A' . $highestRow;
        $sheet->fromArray($columnParticulars,NULL,$nextRow);
        $nextRow = 'C' . $highestRow;
        $sheet->fromArray($columnAmounts,NULL,$nextRow);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 1;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, 'TOTAL');
        $nextRow = 'C' . $highestRow;
        $sheet->setCellValue($nextRow, $total);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 2;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, $preparedByTitle);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 1;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, $user);
        $highestRow = $sheet->getHighestRow();
        $highestRow += 1;
        $nextRow = 'A' . $highestRow;
        $sheet->setCellValue($nextRow, $posLevel);
        $writer = new Xlsx($spreadsheet);
		$writer->save(dirname(__FILE__).'/../../../storage/'.$excelName);
	}

//generateReport("haha","haha","haha","haha","haha","haha","haha","haha","haha","haha",["haha", "haha"],["haha", "haha"],["haha", "haha"],["haha", "haha"],"haha",["haha", "haha"],["haha", "haha"],["haha", "haha"],["haha", "haha"],["haha", "haha"],[1,2],3,"haha","haha","haha","haha");
	generateReport($_POST['activityTitle'],$_POST['proponents'],$_POST['beneficiaries'],$_POST['accomplishedObjectives']
	,$_POST['monthSelected'],$_POST['daySelected'],$_POST['yearSelected'],$_POST['venue'],$_POST['timeImplemented']
	,$_POST['briefNarrative'],$_POST['volunteers'],$_POST['positions'],$_POST['participations'],$_POST['groups']
	,$_POST['servedCommunity'],$_POST['timestart'],$_POST['timeend'],$_POST['activity'],$_POST['person'],$_POST['particulars']
	,$_POST['amounts'],$_POST['total'],$_SESSION['fullname'],$_SESSION['navbar'],$_POST['department'],$_POST['course']);
?>