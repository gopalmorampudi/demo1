<?php
session_start();
include "DBConnection.php";
$h=$_REQUEST['hcount'];

 $tutor_id=$_SESSION['tutor_id'];
 for($i=0;$i<=$h;$i++){
 $course=$_REQUEST['course'.$i];
  $expe=$_REQUEST['expe'.$i];
  $query="update courses_experience set expertize='$expe' where tutor_id=$tutor_id and course_id=$course";
$result=mysql_query($query);
 }
	header("Location: tutor_profile.php");
?>