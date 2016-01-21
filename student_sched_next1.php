<?php
for($i=0;$i<7;$i++){
 	$date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));
	$curr_date=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $diffDay , date('Y')));	
	$day=date('l', mktime(0, 0, 0, date('m'), date('d') + $diffDay , date('Y')));	 
$array1=array();
$lastArray=array();
$middelArray=array();
//$date2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $diffDay , date('Y')));
$sql="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$curr_date' and tr.fperiod='AM' order by tr.fhours;";
$result=  mysql_query($sql);
while($res=mysql_fetch_row($result)){
	$record=array();	
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($record,$res[10]);
	array_push($record,$res[11]);
	array_push($array1,$record);
}

$sql1="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$curr_date' and tr.fperiod='PM' order by tr.fhours;";
$result1=  mysql_query($sql1);
while($res=mysql_fetch_row($result1)){
	if($res[5]==12){
		$record=array();	
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($record,$res[10]);
		array_push($record,$res[11]);
		array_push($middelArray,$record);
	}else{
		$record=array();	
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($record,$res[10]);
		array_push($record,$res[11]);
		array_push($lastArray,$record);
	}
}

 $c=count($array1);
 $c2=count($middelArray);
 $c3=count($lastArray);
	// if(!strpos($date1,'Sunday')){
		// if(!strpos($date1,'Saturday')){
			 ?>
			<tr>
			<td>
			<span><?=$date1?></span>
			</td>		
				<?php
				$j=0;
					foreach($array1 as $a){
				$student='';
				$timings='';
				if($a[5]<=9) $timings.= '0'.$a[5];
						else $timings.= $a[5];
					$timings.= ":";
					if($a[6]<=9) $timings.= '0'.$a[6];
						else $timings.= $a[6];
						$timings.=' '.$a[7];
					$timings.='-';
					
					if($a[8]<=9) $timings.='0'.$a[8];
						else $timings.= $a[8];
					$timings.= ":";
					if($a[9]<=9) $timings.= '0'.$a[9];
						else $timings.= $a[9];
					$timings.=' '.$a[10];
					
				if($a[11]=='Preferred'){
					if(isset($_SESSION['student_id']))
					$student=$_SESSION['student_id'];
				?> 
				
<!--<td style="background:green;color:white;cursor:pointer"  onclick="window.open('fix-appointment.php?id=<?=$a[0]?>&date=<?=$a[3]?>&time=<?=$timings?>&student=<?=$student?>&tutor=<?=$user?>&subject=<?=$sid?>','','width=500, height=500');">-->
<td style="background:#3D79E6;color:white;cursor:pointer"  onclick="window.location='appointment_popup.php?id=<?=$a[0]?>&date=<?=$a[3]?>&time=<?=$timings?>&student=<?=$student?>&tutor=<?=$user?>&subject=<?=$sid?>';">
<?php 
				}
				else if($a[11]=='class'){
					$a[11]='Appointment Fixed';
					?>
					<td style="background:green;color:white;">
					<?php
				}
				else if($a[11]=='cancelReq'){
					$a[11]='Appointment Cancelled';
						?> 
<td style="background:yellow;color:black;">
<?php 	
				}else if($a[11]=='block'){
					$a[11]='Appointment Blocked';
						?> 
<td style="background:gray;color:white;">
<?php 	
				}
?>
				<table>
					<tr>
					<td>
					<?=$timings?>
					</td>
					</tr>
					<tr>
					<td colspan="3"><center><?=$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
					$j++;
				}
				?>
				
				
				
				
				
				
				<?php
				
					foreach($middelArray as $a){
				$student='';
				$timings='';
				if($a[5]<=9) $timings.= '0'.$a[5];
						else $timings.= $a[5];
					$timings.= ":";
					if($a[6]<=9) $timings.= '0'.$a[6];
						else $timings.= $a[6];
						$timings.=' '.$a[7];
					$timings.='-';
					
					if($a[8]<=9) $timings.='0'.$a[8];
						else $timings.= $a[8];
					$timings.= ":";
					if($a[9]<=9) $timings.= '0'.$a[9];
						else $timings.= $a[9];
					$timings.=' '.$a[10];
					
				if($a[11]=='Preferred'){
					$student=$_SESSION['student_id'];
				?> 
				
<!--<td style="background:green;color:white;cursor:pointer"  onclick="window.open('fix-appointment.php?id=<?=$a[0]?>&date=<?=$a[3]?>&time=<?=$timings?>&student=<?=$student?>&tutor=<?=$user?>&subject=<?=$sid?>','','width=500, height=500');">-->
<td style="background:#3D79E6;color:white;cursor:pointer" onclick="window.location='appointment_popup.php?id=<?=$a[0]?>&date=<?=$a[3]?>&time=<?=$timings?>&student=<?=$student?>&tutor=<?=$user?>&subject=<?=$sid?>';">
<?php 
				}
				else if($a[11]=='class'){
					$a[11]='Appointment Fixed';
					?>
					<td style="background:green;color:white;">
					<?php
				}
				else if($a[11]=='cancelReq'){
					$a[11]='Appointment Cancelled';
						?> 
<td style="background:yellow;color:black;">
<?php 	
				}else if($a[11]=='block'){
					$a[11]='Appointment Blocked';
						?> 
<td style="background:gray;color:white;">
<?php 	
				}
?>
				<table>
					<tr>
					<td>
					<?=$timings?>
					</td>
					</tr>
					<tr>
					<td colspan="3"><center><?="".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
					$j++;
				}
				?>
				
				
				<?php
			
					foreach($lastArray as $a){
				$student='';
				$timings='';
				if($a[5]<=9) $timings.= '0'.$a[5];
						else $timings.= $a[5];
					$timings.= ":";
					if($a[6]<=9) $timings.= '0'.$a[6];
						else $timings.= $a[6];
						$timings.=' '.$a[7];
					$timings.='-';
					
					if($a[8]<=9) $timings.='0'.$a[8];
						else $timings.= $a[8];
					$timings.= ":";
					if($a[9]<=9) $timings.= '0'.$a[9];
						else $timings.= $a[9];
					$timings.=' '.$a[10];
					
				if($a[11]=='Preferred'){
					if(isset($_SESSION['student_id']))
					$student=$_SESSION['student_id'];
				?> 
				
<!--<td style="background:green;color:white;cursor:pointer"  onclick="window.open('fix-appointment.php?id=<?=$a[0]?>&date=<?=$a[3]?>&time=<?=$timings?>&student=<?=$student?>&tutor=<?=$user?>&subject=<?=$sid?>','','width=500, height=500');">-->
<td style="background:#3D79E6;color:white;cursor:pointer" onclick="window.location='appointment_popup.php?id=<?=$a[0]?>&date=<?=$a[3]?>&time=<?=$timings?>&student=<?=$student?>&tutor=<?=$user?>&subject=<?=$sid?>';">
<?php 
				}
				else if($a[11]=='class'){
					$a[11]='Appointment Fixed';
					?>
					<td style="background:green;color:white;">
					<?php
				}
				elseif($a[11]=='cancelReq'){
					$a[11]='Appointment Cancelled';
						?> 
<td style="background:yellow;color:black;">
<?php 	
				}else if($a[11]=='block'){
					$a[11]='Appointment Blocked';
						?> 
<td style="background:gray;color:white;">
<?php 	
				}
?>
				<table>
					<tr>
					<td>
					<?=$timings?>
					</td>
					</tr>
					<tr>
					<td colspan="3"><center><?="".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
					$j++;
				}
				?>
				
				<?php
				for($k=0;$k<10-($c+$c2+$c3);$c++){
					?>
					<td style="background:#d2deef">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
				}
					?>				
			</tr>
			<?php
		// }
	// }
	 $iCount++;
$diffDay++;
 }
 ?>