<?php
include "DBConnection.php";
$date=$_REQUEST['date'];
$curr_date=date("Y-m-d");
$dateArray=explode("-",$date);
$curr_dateArray=explode("-",$curr_date);
$diffDay=$dateArray[2]-$curr_dateArray[2];
$diffMonth=$dateArray[1]-$curr_dateArray[1];
$diffYear=$dateArray[0]-$curr_dateArray[0];
 $weekDayArray = array("Sunday"=>"0","Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3","Thursday"=>"4","Friday"=>"5","Saturday"=>"6");
?>