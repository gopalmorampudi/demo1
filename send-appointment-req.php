<?php
session_start();
include "DBConnection.php";
$student_id=$_SESSION['student_id'];
$id=$_REQUEST['id'];
$tid=$_REQUEST['tid'];
$tName=$_REQUEST['tName'];
$sid=$_REQUEST['sid'];
$sName=$_REQUEST['sName'];
$date=$_REQUEST['dateSelected'];
$time=$_REQUEST['time'];
$timeArray=explode("-",$time);

$fromArray=explode(" ",$timeArray[0]);
$fromPeriod=$fromArray[1];
$fromTimeArray=explode(":",$fromArray[0]);
$fromHours=$fromTimeArray[0];
$fromMinutes=$fromTimeArray[1];

$toArray=explode(" ",$timeArray[1]);
$toPeriod=$toArray[1];
$toTimeArray=explode(":",$toArray[0]);
$toHours=$toTimeArray[0];
$toMinutes=$toTimeArray[1];

$purpose=$_REQUEST['purpose'];

  $query="insert into appointments(instructor_id,student_id,course_code,a_date,from_hour,to_hour,from_min,to_min,from_period,to_period,purpose,row_id) 
values($tid,$student_id,$sid,'$date',$fromHours,$toHours,$fromMinutes,$toMinutes,'$fromPeriod','$toPeriod','$purpose',$id)";

$result=mysql_query($query);
 if($result){
	$_SESSION['req']='requestSuccess';
	header("Location:view_subject.php");
}else{
	$_SESSION['req']='requestFailed';
	header("Location:view_subject.php");
}  
?>