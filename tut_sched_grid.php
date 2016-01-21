<?php
session_start();
include "DBConnection.php";
$user=$_SESSION['tutor_id'];
$date=$_REQUEST['date'];
$weekday=$_REQUEST['weekday'];
$icount=$_REQUEST['icount'];
$fhours=array();
$fminutes=array();
$fperiods=array();
$thours=array();
$tminutes=array();
$tperiods=array();
$options=array();
for($j=0;$j<8;$j++){
	array_push($fhours,$_REQUEST['fhour'.$icount.$j]);
	array_push($fminutes,$_REQUEST['fminutes'.$icount.$j]);
	array_push($thours,$_REQUEST['thour'.$icount.$j]);
	array_push($tminutes,$_REQUEST['tminutes'.$icount.$j]);
	array_push($options,$_REQUEST['options'.$j]);
}

for($i=0;$i<8;$i++){
  $sql="insert into tutor_schedule2(tutor_id,date_day,week_day,fhours,fminutes,thours,tminutes,status) values($user,'$date','$weekday',$fhours[$i],$fminutes[$i],$thours[$i],$tminutes[$i],'$options[$i]')";
$result=  mysql_query($sql);
if($result){
	header("Location: view_tutor_schedule.php");
}
}
?>