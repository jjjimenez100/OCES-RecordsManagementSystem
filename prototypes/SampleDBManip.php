<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 10/31/2017
 * Time: 8:40 PM
 */

/*
 * Department = tbldepartment
 * Report = tblreport
 * User = tbluser
 * Volunteer = tblVolunteer
 */

//inserting new row

$instance = new User();
//               ^
$instance->First_Name = "Josh";
//         ^-column names, case sensitive

$instace->save();
//^if gusto nang iinsert sa db

//-------------------------------------------------------
//queries
$deparments = Department::all(); //gets all rows
               //^tblname/model

foreach($deparments as $deparment){
    $department->Department; //kunin yung department column sa lahat ng rows
}

foreach(User::all() as $user){
    $user->First_Name; //kunin yung first_name col
}

//---------------------------------------------
$users = User::where('Department', 'CICT')->get();
//lahat ng may department na cict
//importante yung ->get();
//tapos pede nang iforeach to para ma iterate lahat
foreach($users as $user){
    //and so on
}

//---------------------------------------------
$user = User::where('Department', 'CICT')->first();
//kukunin yung first row sa result
//kahit hindi na ifor each to kasi isang instance lang so:
$user->First_Name; //kunin yung first name nung user na nag match
$user->Last_Name; //and so on


//---------------------------------------------
$user = User::find(20448088);
//matic hahanapin sa primary key to^
//kahit di na din iforeach to


//---------------------------------------------
//updating
//so kung may na kuha kang instance na isa lang
//pede mo siya update na kagad

$user = User::where('Department', 'SEA')->first();
//assuming na may nag match

$user->First_Name = "Gustong Ipalit";
//and so on
$user->save();
//^kapag tapos na iupdate yung columns

//----------------------------------------------
//delete
//i call lang yung ->delete method sa isang instance

User::find(20448088)->delete();
User::where('Department', 'CICT')->first()->delete();





//-------------------------------------------------
//pagqquery kung may relationship

//sa volunteers lang naman magagamit to:

$volunteer = Volunteer::where('UserID', 20448088)->first();
//kunware gusto ko malaman sino si user ID 20448088
$volunteer->creator->First_Name;
//creator yung name ng function ng Volunteer class para makuha yung naka link na user
//kung gusto niyo icheck, nasa models folder tapos Volunteer.php
//so bale kkunin nito yung First_Name na naka link sa foreign key ng UserID.
$volunteer->creator->Last_Name;
$volunteer->creator->Username;
//and so on



//kung yung sa isang foregin key namang: Activity_Code
$volunteer = Volunteer::where('UserID', 20448088)->first();
//kunware gusto ko malaman yung mga data sa tblreport na naka link kay volunteer
$volunteer->report->Date;
//kukunin yung date ng report na naka link kay volunteer
//etc etc
