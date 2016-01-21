<?php
include "dbconnection.php";
$query="SELECT a_date, from_hour, to_hour, from_min, to_min, from_period, to_period FROM appointments WHERE instructor_id=1 and status='app_fixed'";
$result=mysql_query($query);
$i=0;
$totalTime='';
while($res=mysql_fetch_array($result)){
$a_date=$res['a_date'];
$from_hour=$res['from_hour'];
$to_hour=$res['to_hour'];
$from_min=$res['from_min'];
$to_min=$res['to_min'];
$from_period=$res['from_period'];
$to_period=$res['to_period'];
if($from_min<9){
$from_min1= "0".$from_min;
}else{
$from_min1=$from_min;
}
if($to_min<9){
$to_min1= "0".$to_min;
}else{
$to_min1=$to_min;
}
$date=$a_date;
$fTime=$from_hour.":".$from_min1." ".$from_period;
$TTime=$to_hour.":".$to_min1." ".$to_period;
/*
echo "Form Time=".$fTime;
echo "<br/>";
echo "TO Time=".$TTime;
echo "<br/>";*/
$formTime_in_24_hr  = date("H:i", strtotime($fTime));
$ToTime_in_24_hr  = date("H:i", strtotime($TTime));
$start_date = new DateTime($date.' '.$formTime_in_24_hr);
$since_start = $start_date->diff(new DateTime($date.' '.$ToTime_in_24_hr));
//echo $since_start->days.' days total<br>';
//echo $since_start->y.' years<br>';
//echo $since_start->m.' months<br>';
//echo $since_start->d.' days<br>';
$hours=$since_start->h;
$mints=$since_start->i;
//$since_start->h.' hours<br>';
//$since_start->i.' minutes<br>';
//echo $since_start->s.' seconds<br>';
$totalTime2='';
if($i==0){
$totalTime=$hours.":".$mints;
}
else {	
$day1hours = $totalTime;
$day2hours = $hours.":".$mints;
$day1 = explode(":", $day1hours);
$day2 = explode(":", $day2hours);
$totalmins = 0;
$totalmins += $day1[0] * 60;
$totalmins += $day1[1];
$totalmins += $day2[0] * 60;
$totalmins += $day2[1];
$hoursTotal = $totalmins / 60;
$hours1=0;
$hours1 = explode(".", $hoursTotal);
$hours1= $hours1[0];
$minutes = $totalmins % 60;
echo $totalTime = "$hours1".':'."$minutes";	
}	
$i++;
}
echo $totalTime;
?>