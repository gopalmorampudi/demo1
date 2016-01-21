<?php
include "DBConnection.php";
class StudentMainClass{
	public $subjectArray;
	
	 function __construct($id) {
		 $this->subjectArray=$this->getSubjects($id);
    }
   
	public  function getSubjects($tutorId){
		$megaContainer=array();
			$sql="select subject from tutor where tutor_id='$tutorId'";
			$result=mysql_query($sql);
			if($res=mysql_fetch_row($result)){
			$nestedSql='select subject_id,subject_name from subject where subject_id in('.$res[0].')';
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
}

 ?>

