<?php
 session_start();
include "dbconnection.php";
 $weekDayArray = array("Sunday"=>"0","Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3","Thursday"=>"4","Friday"=>"5","Saturday"=>"6");
$user=$_REQUEST['id'];
 $sid=$_REQUEST['sid'];
$date;
$weekDay;
$weekDayCount;
 $dateCounter=0;
$gArray;
 $cArray;

 $date=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $weekDay=date('l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $weekDayCount=$weekDayArray[$weekDay];

 ?>
 <div id="grid">
 <table class="table table-bordered">
 <?php

 for($i=$weekDayCount;$i>=1;$i--){
	 
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
$array1=array();
$lastArray=array();
$middelArray=array();
$date2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
$sql="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$date2' and tr.fperiod='AM' order by tr.fhours;";
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
	array_push($lastArray,$record);
	
}
$sql1="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$date2' and tr.fperiod='PM' order by tr.fhours;";
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
		 if(!strpos($date1,'Saturday')){
			 
			?>
			<tr style="font-weight:bold;">
			<td>
			<span><?=$date1?></span>
			</td>
			
			<?php
					foreach($array1 as $a){
						$timings='';
				if($a[5]<=9) $timings.= '0'.$a[5];
						else $timings.= $a[5];
					$timings.= ":";
					if($a[6]<=9) $timings.= '0'.$a[6];
						else $timings.= $a[6];
						$timings.=$a[7];
						$timings.='-';
					
					if($a[8]<=9) $timings.='0'.$a[8];
						else $timings.= $a[8];
					$timings.= ":";
					if($a[9]<=9) $timings.= '0'.$a[9];
						else $timings.= $a[9];
						$timings.=$a[10];
				?>
				<td style="background:#eaeff7">
				<table>
					<tr>
					<td><?=$timings?></td>
					</tr>
					<tr>
					<td colspan="3"><center><?="Status :- ".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
				}
				?>
				
				
				<?php
				
					foreach($middelArray as $a){
						$timings='';
				if($a[5]<=9) $timings.= '0'.$a[5];
						else $timings.= $a[5];
					$timings.= ":";
					if($a[6]<=9) $timings.= '0'.$a[6];
						else $timings.= $a[6];
						$timings.=$a[7];
						$timings.='-';
					
					if($a[8]<=9) $timings.='0'.$a[8];
						else $timings.= $a[8];
					$timings.= ":";
					if($a[9]<=9) $timings.= '0'.$a[9];
						else $timings.= $a[9];
						$timings.=$a[10];
				?>
				<td style="background:#eaeff7">
				<table>
					<tr>
					<td><?=$timings?></td>
					</tr>
					<tr>
					<td colspan="3"><center><?="Status :- ".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
				}
				?>
				
				
				
				
				<?php
					foreach($lastArray as $a){
						$timings='';
				if($a[5]<=9) $timings.= '0'.$a[5];
						else $timings.= $a[5];
					$timings.= ":";
					if($a[6]<=9) $timings.= '0'.$a[6];
						else $timings.= $a[6];
						$timings.=$a[7];
						$timings.='-';
					
					if($a[8]<=9) $timings.='0'.$a[8];
						else $timings.= $a[8];
					$timings.= ":";
					if($a[9]<=9) $timings.= '0'.$a[9];
						else $timings.= $a[9];
						$timings.=$a[10];
				?>
				<td style="background:#eaeff7">
				<table>
					<tr>
					<td><?=$timings?></td>
					</tr>
					<tr>
					<td colspan="3"><center><?="Status :- ".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
				}
				?>
				
				
				<?php
				for($k=0;$k<10-($c+$c2+$c3);$c++){
					?>
					<td style="background:rgba(210, 222, 239, 0.28);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
				}
					?>
			</tr>
			<?php
	}
}
$count=count($weekDayArray);
$count2=$count-$weekDayCount;
$i=0;
for($i=0;$i<=$count2;$i++){
$dateCounter++;
$date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	 
$array1=array();
$lastArray=array();
$middelArray=array();
$date2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));
$sql="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$date2' and tr.fperiod='AM' order by tr.fhours;";
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

$sql1="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$date2' and tr.fperiod='PM' order by tr.fhours;";
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
	 if(!strpos($date1,'Sunday')){
			 ?>
			<tr style="font-weight:bold;">
			<td>
			<span><?=$date1?></span>
			</td>		
				<?php
				$j=0;
					foreach($array1 as $a){
				
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
				}
				else if($a[11]=='block'){
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
				}
				else if($a[11]=='block'){
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
	 }
 }
 ?>
 <link rel="stylesheet" href="css/datepicker.css">
<tr>
<td><input type="hidden" id="nextDate" value="<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i-1 , date('Y')));?>"/></td>
</tr>
</table>
<a href='#' onclick="getNextGrid();" style="float:right; font-size:20px; padding: 4px 12px;" class="btn btn-sm">next >></a>
</div>


<br>
<input type="checkbox" name="inconvenient" id="inconvenient" value="inconvenientTime" onchange="disp1(this)">&nbsp;<span>inconvenient timings</span>
<div class="selectDate" style="display:none;" id="selectForm">
	
		<form action="tutor_student_classes.php" method="post">
		<input type="hidden" name="student_id" id="student_id" value="<?=$_SESSION['student_id']?>"><br>
		<input type="hidden" name="selectedSubject" id="selectedSubject" value="<?=$sid?>"><br>
		<span style="font-weight:bold;">Select Date :</span><br>
		<!-- <input type="text"  required name="selectedDate" id="example1"> -->
		<input  type="date" name="selectedDate" id="selectedDate" class="form-control">
		<br><br>
		<span style="font-weight:bold;">Select your convenient  Time :</span>
		<br>
		
		<input type="text" size="3" maxlength="2" required name="hours" placeholder="HH"/>
		<span style="font-weight:bold;">:</span>
		<input type="text" size="3" maxlength="2" required name="minutes" placeholder="MM"/>
		<select id="<?='fhour'.$i.$j?>" name="period" required>
			<option value="AM">AM</option>
			<option value="PM">PM</option>
			</select><br><br>
			<span style="font-weight:bold;">Enter your description :</span><br>
			
			<textarea rows="5" cols="50" name="description" required placeholder="Enter your descriptoin here"></textarea>
		<br><br><button type="submit" name="action" value="request_submit">Request submit</button>
		</form>
		</div>
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 id="h">Hello</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>

</script>


<script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
 <script type="text/javascript">
            $(document).ready(function () {
                $('#selectedDate').datepicker({				
                    format:"yyyy/mm/dd",
					autoclose: true					
                });  
            });
        </script>
