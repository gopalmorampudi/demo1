<?php
session_start();
include "DBConnection.php";
 $student_id=$_SESSION['student_id'];
 $subjectArray=$_REQUEST['subject'];
 if(count($subjectArray))
	$subjectList=implode(',',$subjectArray);
 else
	$subjectList=$subject[0];

$phone_number=$_REQUEST['phone_number'];
$desp=$_REQUEST['desp'];
$working_hours=$_REQUEST['working_hours'];
$working_daysArray=$_REQUEST['working_days'];
 if(count($working_daysArray))
	$working_daysList=implode(',',$working_daysArray);
 else
	$working_daysList=$working_days[0];

 $query="insert into student_to_tutor(student_id,courses_list,phone_number,desp,working_hours,working_days) values($student_id,'$subjectList',$phone_number,'$desp',$working_hours,'$working_daysList')";

 $result=mysql_query($query);
 if($result){
	 $_SESSION['flag']='success';
	header("Location: become_tutor_req.php?success");
}else{
	 $_SESSION['flag']='failed';
	header("Location: become_tutor_req.php?failed");
}  
?>