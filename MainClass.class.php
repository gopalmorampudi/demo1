<?php
session_start();
include "DBConnection.php";
class MainClass{
	public $subjectArray;
	
	 function __construct() {
		 if(isset($_SESSION['tutor_email']))
		$this->subjectArray=$this->getSubjects();
   }
   
	public function getSubjects(){
		global $subjectArray;
		$megaContainer=array();
		$tutor_email=$_SESSION['tutor_email'];
			$sql="select subject from tutor where emailid='$tutor_email'";
			$result=mysql_query($sql);
			if($res=mysql_fetch_row($result)){
			$nestedSql='select subject_id,subject_name from subject where subject_id in('.$res[0].') order by subject_name';
					$nestedRes=mysql_query($nestedSql);
					while($result1=mysql_fetch_array($nestedRes)){
						$minContainer=array();
						array_push($minContainer,$result1[0]);
						array_push($minContainer,$result1[1]);
						array_push($megaContainer,$minContainer);
					}
				}
		return $megaContainer;
	}
	public function getSubjectName($subjectId){
		global $subjectArray;
		$subjectName='';
		foreach($this->subjectArray as $a){
			if($a[0]==$subjectId){
				$subjectName.=$a[1];
				break;
			}
		}
		return $subjectName;
	}
	
	public function setSchedule($dataArray){
		$status='';
		$user=$_SESSION['tutor_id'];
		$query="INSERT INTO tutor_schedule(tutor_id,c1_8AM,c2_9AM,c3_10AM,c4_11AM,c5_12AM,c6_1PM,c7_2PM,c8_3PM,c9_4PM,c10_5PM,weekdays) 
		values";
		$query2="update tutor set schedule_status='schedule' where tutor_id='$user'";
		
		$weekdays=array('Monday','tuesday','Wednesday','Thursday','Friday','Saturday');
		for($i=0;$i<sizeof($dataArray);$i++){
			 $query.="('$user',";
			 for($j=0;$j<sizeof($dataArray[$i]);$j++){
				$data=$dataArray[$i][$j];
				if($data=='null'){
					$query.="null,";
				}else{
					$query.="'$data',";
				}
			 }
			 if($i==sizeof($dataArray)-1)
				$query.="'$weekdays[$i]');";
			else
				$query.="'$weekdays[$i]'),";
		}
			 $result=mysql_query($query);
			 $result2=mysql_query($query2);
			if($result && $result2){
				$status.='success';
			}else{
				$status.='failed';
			}
			return $status;
		}
		public function getAllSubject(){
			$subjectArray=array();
			$query="select subject_id,subject_name from subject order by subject_name";
			 $result=mysql_query($query);
			 while($res=mysql_fetch_array($result)){
				 $miniArray=array();
				 array_push($miniArray,$res[0]);
				 array_push($miniArray,$res[1]);
				 array_push($subjectArray,$miniArray);
			 }
			 return $subjectArray;
		}
		public function isScheduled($tutorId){
			$status='';
			$query="select schedule_status from tutor where tutor_id=$tutorId";
			$result=mysql_query($query);
			if($res=mysql_fetch_row($result)){
				if($res[0]!='unschedule'){
					$status.='yes';
				}else{
					$status.='no';
				}
			}
			return $status;
		}
		public function updateDaySchedule($user,$weekDay,$subjectData){
			$status='';
			$query="update tutor_schedule set c1_8AM=$subjectData[0] ,c2_9AM=$subjectData[1] ,c3_10AM=$subjectData[2] ,c4_11AM=$subjectData[3] ,c5_12AM=$subjectData[4] ,c6_1PM=$subjectData[5] ,c7_2PM=$subjectData[6] ,c8_3PM=$subjectData[7] ,c9_4PM=$subjectData[8] ,c10_5PM=$subjectData[9] where tutor_id=$user and weekdays='$weekDay'";
			$result=mysql_query($query);
			if($res=mysql_fetch_row($result)){
				if($res){
					$status.='success';
				}else{
					$status.='failed';
				}
			}
			return $status;
		}
		
		public function getTutorSchedule(){
			$user=$_SESSION['tutor_id'];
			$query="";
			
		}
}

 ?>

