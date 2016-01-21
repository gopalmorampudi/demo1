<?php
session_start();
include "dbconnection.php"; 
$date= $_POST['date'];
$from_time= $_POST['from_time'];
$from_mints= $_POST['from_mints'];
$fnoon= $_POST['fnoon'];
$to_time= $_POST['to_time'];
$to_mints= $_POST['to_mints'];
$tnoon= $_POST['tnoon'];
 $tutor_id=$_SESSION['tutor_id'];
 $ftime=$from_time.":".$from_mints." ".$fnoon;
 $ttime=$to_time.":".$to_mints." ".$tnoon;
$reason= $_POST['reason'];
$description= $_POST['description'];  

$que="update appointments set status1='cancel' where instructor_id= '$tutor_id' and from_hour = '$from_time'  and to_hour = '$to_time' and from_min = '$from_mints' and to_min = '$to_mints'";
mysql_query($que);


$query="INSERT INTO `tutor_request`(`tutorid`, `data`, `from_time`, `to_time`, `reason`, `description`)
 VALUES ('$tutor_id','$date','$ftime','$ttime','$reason','$description')";
 $res=mysql_query($query);
 
 
if($res && $res1){
	$_SESSION['flag']='reqsuccess';
	header('Location: test.php');
}else{
	$_SESSION['flag']='reqfailed';
	header('Location: test.php');
}
 ?>