<?php
session_start();
include "DBConnection.php";
$date=$_REQUEST['date'];
$day=$_REQUEST['day'];
$fhour=$_REQUEST['fhour'];
$fminutes=$_REQUEST['fminutes'];
$fperiod=$_REQUEST['fperiod'];
$thour=$_REQUEST['thour'];
$tminutes=$_REQUEST['tminutes'];
$tperiod=$_REQUEST['tperiod'];
$user=$_SESSION['tutor_id'];


$sql="select count(*) from tutor_schedule2 t where t.tutor_id=$user and t.date_day='$date' and t.fhours=$fhour and t.fminutes=$fminutes and t.fperiod='$fperiod'";
$res=mysql_query($sql);
if($row=mysql_fetch_array($res)){
	$count=$row[0];
	$query='';
if($count==0){
  $query="insert into tutor_schedule2(tutor_id,date_day,week_day,fhours,fminutes,fperiod,thours,tminutes,tperiod) values($user,'$date','$day',$fhour,$fminutes,'$fperiod',$thour,$tminutes,'$tperiod')";
}else{
	$query="update tutor_schedule2 set status='Preferred' where tutor_id=$user and date_day='$date' and fhours=$fhour and fminutes=$fminutes and fperiod='$fperiod'";
}
$results=mysql_query($query);
if($results)
	echo 'success';
else
	echo 'failed';
}
?>