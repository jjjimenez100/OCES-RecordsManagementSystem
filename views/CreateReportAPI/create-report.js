$(document).ready(function(){
	var volunteer = [];
	var volunteerid = [];
	var position = [];
	var group = [];
	var participation = [];
	var timestart = [];
	var timeend = [];
	var activity = [];
	var person = [];
	var particulars = [];
	var amounts = [];
	
	$('button[name=searchEmpButton]').click(function(e){
		if($('input[name=empId]').val() != '')
		{
			$.ajax({
				url: 'CreateReportAPI/CreateReportPartials/search.php',
				type: 'POST',
				dataType: 'json',
				data: $('form[name=searchForm]').serialize(),
				success: function(data) {
					$('input[name=empName]').val(data.First_Name + ' ' + data.Middle_Name + ' ' + data.Last_Name);
					$('input[name=empPos]').val(data.Position_Level);
					$('#searchVolun').removeClass("alert alert-danger");
					$('#searchVolun').addClass("alert alert-success");
					$('#searchVolun').text("Employee Search Successfully");
				},
				error: function(data) {
					$('#searchVolun').removeClass("alert alert-success");
					$('#searchVolun').addClass("alert alert-danger");
					$('#searchVolun').text("Employee Search Failed");
				}
			});
		}	
		else
		{
			$('#searchVolun').removeClass("alert alert-success");
			$('#searchVolun').addClass("alert alert-danger");
			$('#searchVolun').text("Employee Id is Required");
		}
		e.preventDefault();		
	});
	
	$('button[name=addVolunteer]').click(function(e){
		if($('input[name=empName]').val() != '' && $('input[name=empPos]').val() != '')
		{
			if($('#group').val())
			{
				if($('#participation').val())
				{
					$.ajax({
						url: 'CreateReport.php',
						success: function() {
							volunteer.push($('input[name=empName]').val());
							volunteerid.push($('input[name=empId]').val());
							position.push($('input[name=empPos]').val());
							group.push($('#group').val());
							participation.push($('#participation').val());
							$('#volunTable').append('<tr><td data-title="EMPLOYEE ID.">'+ $('input[name=empId]').val() + '</td><td data-title="NAME OF VOLUNTEER">'+ $('input[name=empName]').val() +'</td><td data-title="GROUP">'+ $('#group').val() +'</td><td data-title="PARTICIPATION">'+ $('#participation').val() +'</td></tr>');
							$('input[name=empId]').val('');
							$('input[name=empName]').val('');
							$('input[name=empPos]').val('');
							$('#searchVolun').removeClass("alert alert-danger");
							$('#searchVolun').addClass("alert alert-success");
							$('#searchVolun').text("Employee Added Successfully");
						},
						error: function() {
							$('#searchVolun').removeClass("alert alert-success");
							$('#searchVolun').addClass("alert alert-danger");
							$('#searchVolun').text("Employee Added Failed");
						}
					});
				}
				else
				{
					$('#searchVolun').removeClass("alert alert-success");
					$('#searchVolun').addClass("alert alert-danger");
					$('#searchVolun').text("Participation is Required");
				}
			}
			else
			{
				$('#searchVolun').removeClass("alert alert-success");
				$('#searchVolun').addClass("alert alert-danger");
				$('#searchVolun').text("Group is Required");
			}
		}
		else
		{
			$('#searchVolun').removeClass("alert alert-success");
			$('#searchVolun').addClass("alert alert-danger");
			$('#searchVolun').text("Employee is Required");
		}
		e.preventDefault();
	});
	
	$('button[name=addActivity]').click(function(e){
		if($('input[name=timeStart]').val() != '')
		{
			if($('input[name=timeEnd]').val() != '')
			{
				if($('input[name=actName]').val() != '')
				{
					if($('input[name=perRespon]').val() != '')
					{
						$.ajax({
							url: 'CreateReport.php',
							success: function() {
								timestart.push($('input[name=timeStart]').val());
								timeend.push($('input[name=timeEnd]').val());
								activity.push($('input[name=actName]').val());
								person.push($('input[name=perRespon]').val());
								$('#progActivities').append('<tr><td data-title="TIME START">'+ $('input[name=timeStart]').val() +'</td><td data-title="TIME END">'+ $('input[name=timeEnd]').val() +'</td><td data-title="ACTIVITY">'+ $('input[name=actName]').val() +'</td><td data-title="PERSON(S) RESPONSIBLE">'+ $('input[name=perRespon]').val() +'</td></tr>');
								$('input[name=timeStart]').val('');
								$('input[name=timeEnd]').val('');
								$('input[name=actName]').val('');
								$('input[name=perRespon]').val('');
								$('#progActivitiesAlert').removeClass("alert alert-danger");
								$('#progActivitiesAlert').addClass("alert alert-success");
								$('#progActivitiesAlert').text("Program Added Successfully");
							},
							error: function() {
								$('#progActivitiesAlert').removeClass("alert alert-success");
								$('#progActivitiesAlert').addClass("alert alert-danger");
								$('#progActivitiesAlert').text("Program Added Failed");
							}
						});
					}
					else
					{
						$('#progActivitiesAlert').removeClass("alert alert-success");
						$('#progActivitiesAlert').addClass("alert alert-danger");
						$('#progActivitiesAlert').text("Person(s) Responsible is Required");
					}
				}
				else
				{
					$('#progActivitiesAlert').removeClass("alert alert-success");
					$('#progActivitiesAlert').addClass("alert alert-danger");
					$('#progActivitiesAlert').text("Activity is Required");
				}
			}
			else
			{
				$('#progActivitiesAlert').removeClass("alert alert-success");
				$('#progActivitiesAlert').addClass("alert alert-danger");
				$('#progActivitiesAlert').text("Time End is Required");
			}
		}
		else
		{
			$('#progActivitiesAlert').removeClass("alert alert-success");
			$('#progActivitiesAlert').addClass("alert alert-danger");
			$('#progActivitiesAlert').text("Time Start is Required");
		}
		e.preventDefault();
	});
	var total = 0;
	$('button[name=addExpense]').click(function(e){
		if($('input[name=financeParticulars]').val() != '')
		{
			if($('input[name=financeAmount]').val() != '')
			{
				$.ajax({
					url: 'CreateReport.php',
					success: function(){
						particulars.push($('input[name=financeParticulars]').val());
						amounts.push($('input[name=financeAmount]').val());
						total = total + Number($('input[name=financeAmount]').val());
						$('#financialTable').append('<tr><td data-title="PARTICULARS">'+ $('input[name=financeParticulars]').val() +'</td><td data-title="AMOUNT" class="text-right">'+ $('input[name=financeAmount]').val() +'</td></tr>');
						$('td[name=total]').text(total);
						$('input[name=financeParticulars]').val('');
						$('input[name=financeAmount]').val('');
						$('#financeReportAlert').removeClass("alert alert-danger");
						$('#financeReportAlert').addClass("alert alert-success");
						$('#financeReportAlert').text("Finance Added Successfully");
					},
					error: function(){
						$('#financeReportAlert').removeClass("alert alert-success");
						$('#financeReportAlert').addClass("alert alert-danger");
						$('#financeReportAlert').text("Finance Added Failed");
					}
				});
			}
			else
			{
				$('#financeReportAlert').removeClass("alert alert-success");
				$('#financeReportAlert').addClass("alert alert-danger");
				$('#financeReportAlert').text("Amount is Required");
			}
		}
		else
		{
			$('#financeReportAlert').removeClass("alert alert-success");
			$('#financeReportAlert').addClass("alert alert-danger");
			$('#financeReportAlert').text("Particulars is Required");
		}
		e.preventDefault();
	});
	
	$('button[name=generateReport]').click(function(){
			if($('input[name=activityTitle]').val() != '')
			{
				if($('input[name=proponents]').val() != '')
				{
					if($('input[name=beneficiaries]').val() != '')
					{
						if($('textarea[name=accomplishedObjectives]').val() != '')
						{
							if($('select[name=monthSelected]').val() && $('select[name=daySelected]').val() && $('select[name=yearSelected]').val())
							{
								if($('input[name=venue]').val() != '')
								{
									if($('input[name=timeImplemented]').val() != '')
									{
										if($('textarea[name=briefNarrative]').val() != '')
										{
											if(volunteer.length != 0)
											{
												if($('textarea[name=servedCommunity]').val() != '')
												{
													if(activity.length != 0)
													{
														if(particulars.length != 0)
														{
															if($('select[name=department]').val() && $('select[name=courses]').val())
															{
																var dataObject = {
																	'activityTitle' : $('input[name=activityTitle]').val(),
																	'proponents' : $('input[name=proponents]').val(),
																	'beneficiaries' : $('input[name=beneficiaries]').val(),
																	'accomplishedObjectives' : $('textarea[name=accomplishedObjectives]').val(),
																	'monthSelected' : $('select[name=monthSelected]').val(),
																	'daySelected' : $('select[name=daySelected]').val(),
																	'yearSelected' : $('select[name=yearSelected]').val(),
																	'venue' : $('input[name=venue]').val(),
																	'timeImplemented' : $('input[name=timeImplemented]').val(),
																	'briefNarrative' : $('textarea[name=briefNarrative]').val(),
																	'volunteers' : volunteer,
																	'volunteersid' : volunteerid,
																	'positions' : position,
																	'participations' : participation,
																	'groups' : group,
																	'servedCommunity' : $('textarea[name=servedCommunity]').val(),
																	'timestart' : timestart,
																	'timeend' : timeend,
																	'activity' : activity,
																	'person' : person,
																	'particulars' : particulars,
																	'amounts' : amounts,
																	'total' : $('td[name=total]').text(),
																	'department' : $('select[name=department]').val(),
																	'course' : $('select[name=courses]').val(),
																	'schoolYear' : $('select[name=schoolYear]').val(),
																	'semester' : $('select[name=semester]').val()
																};
																	$.ajax({
																		url: 'CreateReportAPI/CreateReportPartials/insert.php',
																		type: 'POST',
																		data: dataObject,
																		success: function() {
																			$.ajax({
																				url: 'CreateReportApi/CreateReportPartials/generateReport.php',
																				type: 'POST',
																				data: dataObject
																			});
																			volunteer = [];
																			volunteerid = [];
																			position = [];
																			participation = [];
																			group = [];
																			timestart = [];
																			timeend = [];
																			activity = [];
																			person = [];
																			particulars = [];
																			amounts = [];
																			$('#volunTable').empty();
																			$('#progActivities').empty();
																			$('#financialTable').empty();
																			$('#searchVolun').empty();
																			$('#progActivitiesAlert').empty();
																			$('#financeReportAlert').empty();
																			$('form[name=descriptForm]').trigger('reset');
																			$('textarea[name=servedCommunity]').val('');
																			$('#alert').removeClass("alert alert-danger");
																			$('#alert').addClass("alert alert-success");
																			$('#alert').text("Report Generate Successfully");
																		},
																		error: function() {
																			$('#alert').removeClass("alert alert-success");
																			$('#alert').addClass("alert alert-danger");
																			$('#alert').text("Report Generate Failed");
																		}
																	});
															}
															else
															{
																$('#alert').removeClass("alert alert-success");
																$('#alert').addClass("alert alert-danger");
																$('#alert').text("Department & Course is Required");
															}
														}
														else
														{
															$('#alert').removeClass("alert alert-success");
															$('#alert').addClass("alert alert-danger");
															$('#alert').text("Financial Report is Required");
														}
													}
													else
													{
														$('#alert').removeClass("alert alert-success");
														$('#alert').addClass("alert alert-danger");
														$('#alert').text("Program of Activities is Required");
													}
												}
												else
												{
													$('#alert').removeClass("alert alert-success");
													$('#alert').addClass("alert alert-danger");
													$('#alert').text("Actual Participation is Required");
												}
											}
											else
											{
												$('#alert').removeClass("alert alert-success");
												$('#alert').addClass("alert alert-danger");
												$('#alert').text("Volunteers is Required");
											}
										}
										else
										{
											$('#alert').removeClass("alert alert-success");
											$('#alert').addClass("alert alert-danger");
											$('#alert').text("Brief Narrative is Required");
										}
									}
									else
									{
										$('#alert').removeClass("alert alert-success");
										$('#alert').addClass("alert alert-danger");
										$('#alert').text("Time Implemented is Required");
									}
								}
								else
								{
									$('#alert').removeClass("alert alert-success");
									$('#alert').addClass("alert alert-danger");
									$('#alert').text("Venue is Required");
								}
							}
							else
							{
								$('#alert').removeClass("alert alert-success");
								$('#alert').addClass("alert alert-danger");
								$('#alert').text("Date is not properly set");
							}
						}
						else
						{
							$('#alert').removeClass("alert alert-success");
							$('#alert').addClass("alert alert-danger");
							$('#alert').text("Accomplished Objectives is Required");
						}
					}
					else
					{
						$('#alert').removeClass("alert alert-success");
						$('#alert').addClass("alert alert-danger");
						$('#alert').text("Beneficiaries is Required");
					}
				}
				else
				{
					$('#alert').removeClass("alert alert-success");
					$('#alert').addClass("alert alert-danger");
					$('#alert').text("Proponents is Required");
				}
			}
			else
			{
				$('#alert').removeClass("alert alert-success");
				$('#alert').addClass("alert alert-danger");
				$('#alert').text("Activity Title is Required");
			}
		});
	$('select[name=department]').on("change", function() {
		var department = {
			'department': $('select[name=department]').val(),
		}
	  $.ajax({
		url: 'CreateReportAPI/CreateReportPartials/selectCourse.php',
		type: 'POST',
		data: department,
		dataType: "json",
		success: function(data) {
			$('select[name=courses]').empty();
			$('select[name=courses]').append("<option selected disabled>Select Courses</option>");
			for (var key in data)
			{
				$('select[name=courses]').append("<option>"+ data[key]['course'] +"</option>");
			}
		},
		error: function(data) {
			alert('Error');
		}
		});
	 });
});


