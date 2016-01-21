<?php
session_start();
include "DBConnection.php";
$user=$_SESSION['student_id'];

$optionType=$_REQUEST['optionType'];
$courseNotThere=$_REQUEST['courseNotThere'];
$sql="insert into course_notifications(option_type,content,student_id) values('$optionType','$courseNotThere',$user)";

$result=  mysql_query($sql);
if($result){
	$_SESSION['req']='requestSuccess';
	header("Location: view_subject.php?msg=success");
}else{
	$_SESSION['req']='requestFailed';
}
?>