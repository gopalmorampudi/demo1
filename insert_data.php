<?php
session_start();
require_once('lib/swift_required.php');
include "DBConnection.php";
?>
<html>
<body>
<?php
//common action for all inserting
$action=$_REQUEST['action'];
//Insert subjects..
if($action=='new_subject'){
$subject=$_POST['subject'];	
$sql="insert into subject(subject_name)values('$subject')";
$result=  mysql_query($sql);
if($result)
{
header('Location: view_subject.php?mesg=success');
}
else{
header('Location: add_subject.php?mesg=fail');
}
}

//Update subjects
else if($action=='update_subject'){
    $subject_id=$_REQUEST['subject_id'];
	$subject_name=$_REQUEST['subject_name'];
	$sql="update subject set subject_name='$subject_name' where subject_id='$subject_id'";
	$res=mysql_query($sql);
	if($res){
		header('Location: view_subject.php?mesg=success');
	}else{
		header('Location: view_subject.php?mesg=fail');
	}
}

//insert tutor details----Tutor Registration
else if($action=='insert_tutor_reg'){
	$tutor_name=$_REQUEST['tutor_name'];
	$emailid=$_REQUEST['emailid'];
	$password=$_REQUEST['password'];
	$phone_number=$_REQUEST['phone_number'];
	$subject=$_REQUEST['subject'];
		$sub=implode(',',$subject);
	$working_hours=$_REQUEST['working_hours'];
	$w_days=$_REQUEST['working_days'];
		$working_days=implode(',',$w_days);
	echo $sql="insert into tutor(tutor_name,emailid,password,phone_number,subject,working_hours,working_days) values('$tutor_name','$emailid','$password','$phone_number','$sub','$working_hours','$working_days')";
	$res=mysql_query($sql);

	 
	
	if($res){	
		
		 $sql1="select tutor_id from tutor where emailid='$emailid'";
		$res1=mysql_query($sql1);
		$id=0;
		if($r=mysql_fetch_array($res1)){
			 $id=$r['tutor_id'];
		}
	 for($i=0;$i<count($subject);$i++){
		$query="insert into courses_experience(tutor_id,course_id,expertize) values($id,$subject[$i],'OK')";
		$res2=mysql_query($query);
	}
			$_SESSION['flag']='success';
		header('Location: login_tutor.php?mesg=success'); 
	}else{
		$_SESSION['flag']='failed';
		header('Location: register_tutor.php?mesg=failed');
	} 
}

//view tutor profile
else if($action=='tutor_profile'){
	?>

<center>
<h1>Tutor Profile</h1></center><br>
<table border="1" align="center">
<tr>
<th>TUTOR ID</th>
<th>TUTOR NAME</th>
<th>EMAIL ID</th>
<th>PHONE NUMBER</th>
<th>ADDRESS</th>
<th>Subject</th>
<th>Working Hours</th>
<th>Working Days</th>
<th></th>
</tr>
<tr>
<?php
	$tutor_email=$_SESSION['tutor_email'];
	$sql="select tutor_id,tutor_name,emailid,phone_number,address,subject,working_hours,working_days from tutor where emailid='$tutor_email'";
 $res=mysql_query($sql);
	if($rs=mysql_fetch_array($res)){
	?>	
	<td><?=$rs[0]?></td>
	<td><?php echo $rs[1]?></td>
	<td><?php echo $rs[2]?></td>
	<td><?php echo $rs[3]?></td>
	<td><?php echo $rs[4]?></td>
	<td>
	<?php
		$nestedSql='select subject_name from subject where subject_id in('.$rs[5].')';
		$nestedRes=mysql_query($nestedSql);
		while($result=mysql_fetch_array($nestedRes)){
				echo $result[0].'<br>';
		}
	?>
	</td>
	<td><?php echo $rs[6]?></td>
	<td><?php echo $rs[7]?></td>
	<td>
	<a href="edit_tutor_profile.php?sno=<?=$rs[0]?>">EDIT</a>	
	</td>
<?php	
	}
	?>
	</tr>
	</table>
	<?php
}

//tutor update profile
else if($action=='update_profile'){
	$tutor_id=$_SESSION['tutor_id'];
	$tutorname=$_REQUEST['tutorname'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phno'];
	$subject=$_REQUEST['subject'];
	$sub=implode(',',$subject);
	$hours=$_REQUEST['hours'];
	$w_days=$_REQUEST['days'];
	$days=implode(',',$w_days);
		
	$sql="update tutor set tutor_name='$tutorname',emailid='$email',phone_number='$phone',subject='$sub',working_hours='$hours',working_days='$days' where tutor_id='$tutor_id'";
	 $res=mysql_query($sql);
	 $sql2="delete from courses_experience ce where ce.tutor_id='$tutor_id'";
	 $res2=mysql_query($sql2);
	 for($i=0;$i<count($subject);$i++){
	 $sql3="insert into courses_experience(tutor_id,course_id,expertize) values($tutor_id,$subject[$i],'OK')";
	  $res3=mysql_query($sql3);
	 }
	if($res){
		$_SESSION['prifile']='profileUpdated';
		 header('Location: tutor_profile.php?mesg=success');
	}else{
		$_SESSION['prifile']='profileUpdateFailed';
		 header('Location: tutor_profile.php?mesg=fail');
	}
}

//Accept tutor by Admin
else if($action=='accept_tutor'){
	$tutor_id=$_REQUEST['tutor_id'];
	$sql="update tutor set status='available' where tutor_id='$tutor_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: tutor_request.php?mesg=success');
			}else{
		header('Location: tutor_request.php?mesg=fail');
	}
}

//Reject tutor by Admin
else if($action=='reject_tutor'){
	$tutor_id=$_REQUEST['tutor_id'];
	$sql="update tutor set status='Reject' where tutor_id='$tutor_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: tutor_request.php?mesg=success');
			}else{
		header('Location: tutor_request.php?mesg=fail');
	}
}

//Accept Student by Admin
else if($action=='accept_student'){
	$student_id=$_REQUEST['student_id'];
	$sql="update student set status='Accept' where student_id='$student_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: student_request.php?mesg=success');
			}else{
		header('Location: student_request.php?mesg=fail');
	}
}

//Reject Student by Admin
else if($action=='reject_student'){
	$student_id=$_REQUEST['student_id'];
	$sql="update student set status='Reject' where student_id='$student_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: student_request.php?mesg=success');
			}else{
		header('Location: student_request.php?mesg=fail');
	}
}

//insert schedule details of tutor
else if($action=='tutor_schedule'){
$phone=$_REQUEST['phno'];
	$address=$_REQUEST['address'];
	$subject=$_REQUEST['subject'];
	$sub=implode(',',$subject);
	
	
	
	
	$sql="insert into tutor_schedule(tutor_name,emailid,password,phone_number,address,subject) values('$tutorname','$email','$password','$phone','$address','$sub')";
	$res=mysql_query($sql);
	if($res){
		 echo "sucesss";
			}else{
		echo "fail";
	}	
}

//Insert Student...
else if($action=='new_student'){
	$student_name=$_REQUEST['student_name'];
	$student_id=$_REQUEST['student_id'];
	$emailid=$_REQUEST['emailid'];
	$password=$_REQUEST['password'];
	 $major=$_REQUEST['major'];
	$ay=$_REQUEST['ay'];
	$term=$_REQUEST['term'];
	
$query="insert into student(student_name,emailid,password,major,year,term,stu_id) values('$student_name','$emailid','$password','$major',$ay,'$term','$student_id')";
$result=  mysql_query($query);
if($result)
{
	$_SESSION['flag']='success';
header('Location: login_student.php?mesg=success');
}
else{
	$_SESSION['flag']='failed';
header('Location: register.php?mesg=fail');
}
}

//Update subjects
else if($action=='update_subject'){
    $subject_id=$_REQUEST['subject_id'];
	$subject_name=$_REQUEST['subject_name'];
	$sql="update subject set subject_name='$subject_name' where subject_id='$subject_id'";
	$res=mysql_query($sql);
	if($res){
		
		header('Location: view_subject.php?mesg=success');
	}else{
		header('Location: view_subject.php?mesg=fail');
	}
}

//Update student...
else if($action=='update_student'){
    $student_id=$_REQUEST['student_id'];
	$student_name=$_REQUEST['student_name'];
	$emailid=$_POST['emailid'];	
	$major=$_POST['major'];
	$year=$_POST['ay'];
	$term=$_POST['term'];
	
	echo $sql="update student set student_name='$student_name',major='$major',year=$year,term='$term' where stu_id='$student_id'";
 	$res=mysql_query($sql);
	if($res){
		$_SESSION['flag']='success';
		header('Location: student_profile.php?mesg=success');
	}else{
		$_SESSION['flag']='failed';
		header('Location: student_profile.php?mesg=fail');
	} 
}

//change password of student
else if($action=='student_change_password')
 {	
		$student_email=$_SESSION['student_email'];
		$oldpassword=$_POST['oldpassword'];
		$newpassword=$_POST['newpassword'];
		$confpassword=$_POST['confpassword'];
		$query="select * from student where password='$oldpassword' and emailid='$student_email'";
		$results=mysql_query($query);
		while($row=mysql_fetch_array($results))
		{
			 $password=$row['password'];	
		}
		if($password==$oldpassword)
		{
			if($newpassword==$confpassword)
			{
				 $update="update student set password='$confpassword' where password='$oldpassword' and emailid='$student_email'";
				$run=mysql_query($update);
				$_SESSION['flag']="success";
				header('Location: change_password.php?res=success');	
			}else{
				$_SESSION['flag']="failed";
				header('Location: change_password.php?res=failure');
			}
		}else{
			header('Location: change_password.php?res=failure');
		}
 }
//View student profile
else if($action=='student_profile'){
?>
<center>
<h1>Student Profile</h1></center><br>
<table border="1" align="center">
<tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Email ID</th>
<th>Mobile</th>
<th>Address</th>
<th>Operations </th>
</tr>
<tr>
<?php
$student_email=$_SESSION['student_email'];
$sql="select * from student where emailid='$student_email'";
$res=mysql_query($sql);
if($student=mysql_fetch_assoc($res)) {
?>		

<td><?=$student['student_id']?></td>
<td><?=$student['student_name']?></td>
<td><?=$student['emailid']?></td>
<td><?=$student['phone_number']?></td>
<td><?=$student['address']?></td>
<td>
	<a href="update_student_profile.php?student_id=<?=$student['student_id']?>" class="btn btn-primary">Edit</a>	
</td>

<?php
}
?>
</tr>
</table>
<?php
}

//Schedule_tutor-timings
else if($action=='schedule_tutor_timings'){
$tutor_email=$_SESSION['tutor_email'];
$tutor_id=$_SESSION['tutor_id'];
$subject=$_REQUEST['subject'];
$from_time=$_REQUEST['from_time'];
$to_time=$_REQUEST['to_time'];

$week_day=$_REQUEST['week_day'];
$week_day1=implode(',',$week_day);
echo count($week_day);

$tutor_id=$_SESSION['tutor_id'];
$sql1="select t.working_days from tutor t where t.tutor_id='$tutor_id'";
$result=mysql_query($sql1);
 if($res=mysql_fetch_row($result)){
	 $rs=$res[0];
	 if(count($week_day)<=$rs){

$sql="insert into tutor_schedule(tutor_id,subject_id,from_time,to_time,week_days)values('$tutor_id','$subject','$from_time','$to_time','$week_day1')";
$res1=mysql_query($sql);
	if($res1){
	
		 $_SESSION['flag']='success';
		 header('Location: schedule_form.php?action=schedule');
			}else{
		
		$_SESSION['flag']='failed';
		 header('Location: schedule_form.php?action=schedule');
	}
}else{
		$_SESSION['flag']='failed';
		 header('Location: schedule_form.php?action=schedule');
}
}
}

//complaint
else if($action=='complaint'){
 $student_email=$_SESSION['student_email'];
 
 $subject_name=$_REQUEST['subject'];
 $tutor_name=$_REQUEST['tutor'];
 $description=$_REQUEST['description'];
	
 $sql="insert into complaint(emailid,subject_name,tutor_name,description) values('$student_email','$subject_name','$tutor_name','$description')";
 $res=mysql_query($sql);
	if($res){		
	echo "secces";
		header('Location: complaint.html?mess=sucess');		
	}else{		
		header('Location: complaint.html?mess=fail');
	}			
}

else if($action=='student_view_subject'){
?>
<center><h3>View Subjects</h3></center><br>
<script src="jquery-1.9.0.min.js"></script>
<script>
 function showTutor(sel) {
                        var subject_id = sel.options[sel.selectedIndex].value;
				
                        $("#output1").html("");
                        $("#output2").html("");
                        if (subject_id.length > 0) {

                            $.ajax({
                                type: "GET",
                                url: "fetch_tutor.php",
                                data: "subject_id=" + subject_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output1').html();
                                },
                                success: function(html) {
                                    $("#output1").html(html);
                                }
                            });
                        }
                    }

					 
</script>

<script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script');
                                    po.type = 'text/javascript';
                                    po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0];
                                    s.parentNode.insertBefore(po, s);
                                })();
</script>
<script>
function f(id){

	var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById("output2").innerHTML=xmlhttp.responseText;
    }
  }
  var url="callableClasses.php?type=getTutorSchedule&id="+id.id;
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
</script>
<table border>
<tr>
<td>Subject Name : 
<select name="subject" onChange="showTutor(this);">
<option value="">Select subject</option>

	<?php
	$sql="select * from subject";
	$result=mysql_query($sql);
	while($res=mysql_fetch_array($result)){
	?>
	<option value="<?=$res['subject_id']?>"><?=$res['subject_name']?></option>
	<?php
	}
?>
 
</select>
</td>
</tr>

<tr>
                            <td align="center" height="50">
                            <div id="output1" style="border:1px solid green;width:100%;position:relative;min-height:0px;"></div> </td>
                   
                            <td align="center" height="50">
                            	<div id="output2"></div> 
								
								</td>
                        </tr>
						
						<tr>
						<td></td>
						<td><div id="dateSelect" style="border:1px solid green;width:100%;position:relative;min-height:0px;">
								
								</div></td>
						</tr>
						
						
						</table>
</form>
<?php	
}					
else if($action=='tutor_schedule1'){

$tutor_id=$_REQUEST['tutor_id'];

?>
<table border="1" align="center">
<tr>
<th>Schedule_id</th>
<th>Tutor ID</th>
<th>subject_id</th>
<th>from_time</th>
<th>to_time</th>
<th>week_days</th>
<th>status</th>
</tr>
<?php
if ($tutor_id <> "") {
$sql = "SELECT * FROM tutor_schedule WHERE tutor_id ='$tutor_id'";
$res=mysql_query($sql);
if($rs=mysql_fetch_array($res)) {
?>		
<tr>
<td><?=$rs['schedule_id']?></td>
<td><?=$rs['tutor_id']?></td>
<td><?=$rs['subject_id']?></td>
<td><?=$rs['from_time']?></td>
<td><?=$rs['to_time']?></td>
<td><?=$rs['week_days']?></td>
<td><?=$rs['status']?></td>
</tr>
<?php
}
}
}

?>
</table>
</body>
</html>




