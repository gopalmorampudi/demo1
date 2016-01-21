<?php
session_start();
include 'dbconnection.php';
if(empty($_SESSION['student_email']))
header("Location:index.php");
$subj='';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Student|View Profile</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a href="Student_profile.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="Student_profile.php">View Profile</a></li>
					<li><a href="view_subject.php">Make appointment</a></li>
					<li><a href="student_search_appointments.php">Appointments</a></li>
					<li><a href="become_tutor_req.php">Become tutor</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li><a href="student_logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
$student_email=$_SESSION['student_email'];
$sql="select * from student where emailid='$student_email'";
$res=mysql_query($sql);
if($row=mysql_fetch_assoc($res)) {
?>	
		<header id="head" class="secondary">
            <div class="container">
                    <h1>
					Student Profile
						
					</h1>
                    <h4>Hi <?=$_SESSION['student_name']=$row['student_name']?></h4>
                </div>
    </header>


	<div class="container container-ht">

	

<div id="editAfter" style="display:none;">
               <div class="container" style="table-align:right">
				<div class="row">
                  <div class="col-md-4"></div>
					<div class="col-md-6">
					
						<h3 class="section-title" style="color:green;">
						<?php
						if(isset($_SESSION['flag'])){
							if($_SESSION['flag']=='success'){
								echo 'Your profile has been updated';
							}else if($_SESSION['flag']=='failed'){
								echo 'Sorry we are unable to update your profile';
							}
						}
					?>
						</h3>
						<p></p>
						
						<form class="form-light mt-20" action="insert_data.php?action=update_student" method="post" role="form" onsubmit="return formValidations();">
							<div class="form-group">
								<label>Student ID</label>
							<input type="text" class="form-control" name="student_id" value="<?=$row['stu_id']?>"readonly>
							</div>
							<div class="form-group">
								<label>Student Name</label>
								<input type="text" class="form-control" id="studentName1" name="student_name" value="<?=$row['student_name']?>" 
								onkeypress="noneErrors(studentName1,studentName1Error)">
								<span id="studentName1Error" style="color:red"></span>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" name="emailid" class="form-control" value="<?=$row['emailid']?>" readonly>
										
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group" >
										<label>Major</label>
							
										<select name="major" id="major" class="form-control"
												onchange="noneErrors(major,major1Error)">
											<option value="">Select Major Subject</option>
											<?php
											$sql="select * from departments";
											$result=  mysql_query($sql);
											while($row1=mysql_fetch_array($result)){
											?>
												<option value="<?=$row1['dept_id']?>"
									<?=($row['major']==$row1['dept_id'])?'selected':''?>><?=$row1['dept_name']?></option>
											<?php	
											}
											?>
											<option value="others">others</option>
										</select>
										<span id="major1Error" style="color:red"></span>
									</div>
									<div class="form-group">
										<label>Year</label>
									
										<select class="form-control" name="ay" id="ay" 
										onchange="noneErrors(ay,ayError)">
											<option value="">Select Academic year</option>
											<?php
											$currentYear=date('Y', mktime(0, 0, 0, date('m'), date('d') +0, date('Y')));
											for($i=2014;$i<=$currentYear;$i++){
												?>
												<option value="<?=$i?>" <?=($row['year']==$i)?"selected":''?>><?=$i?></option>
												<?php
											}
											?>
										</select>
										<span id="ayError" style="color:red;"></span>
									</div>
									<div class="form-group">
										<label>Term</label>
										
										<select class="form-control" name="term" id="term" onchange="noneErrors(term,termError)">
										<option value="">Select term</option>
										<option value="FA" <?=($row['term']=='FA')?"selected":''?>>FALL</option>
										<option value="SP" <?=($row['term']=='SP')?"selected":''?>>SPRING</option>
										</select>
										<span id="termError" style="color:red;"></span>
									</div>
								</div>
							</div>
                             
							
							<button type="submit" class="btn btn-primary">Update</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="cancel" class="btn btn-two" value="Cancel" onclick="notEditable()">
							</a><p><br/></p>
						</form>
					</div>
					</div>
					</div>
					</div>
					
					
					
					
					<div id="editBefore">
					
					
					
                        <div class="col-md-4"></div>
					<div class="col-md-6">
							<h3 class="section-title" style="color:green;">
						<?php
						if(isset($_SESSION['flag'])){
							if($_SESSION['flag']=='success'){
								echo 'Your profile has been updated';
							}else if($_SESSION['flag']=='failed'){
								echo 'Sorry we are unable to update your profile';
							}
						}
					?>
						</h3>
						
						
						
							<div class="form-group">
								<label>Student ID</label>
								<input type="text" class="form-control" name="student_id" value="<?=$row['stu_id']?>"readonly>
							</div>
							<div class="form-group">
								<label>Student Name</label>
								<input type="text" readonly class="form-control" name="student_name" value="<?=$row['student_name']?>">
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" name="emailid" class="form-control" value="<?=$row['emailid']?>"readonly>
									</div>
								</div>
								<div class="col-md-12">
								<div class="form-group" >
										<label>Major</label>
							
										
											<?php
						$major1=$row['major'];
											$sql="select * from departments where dept_id=$major1";
											$result=  mysql_query($sql);
											if($row1=mysql_fetch_array($result)){
											?>
											<input type="text" name="major1" id="id1" class="form-control" value="<?=$row1['dept_name']?>"readonly>
												
											<?php	
											}
											?>
											
										<span id="major1Error" style="color:red"></span>
									</div>
									</div>
								<div class="col-md-12">
									
									<div class="form-group" >
										<label>Year</label>
										<input type="text" name="Year" id="year" class="form-control" 
										value="<?=$row['year']?>" readonly>
									</div>
									<div class="form-group" >
										<label>Term</label>
										<input type="text" name="term" id="term" class="form-control" 
										value="<?=($row['term']=='SP')?'SPRING':'FALL'?>" readonly>
									</div>
								</div>
							</div>
                             
							
							<button onclick="makeEditable()"  class="btn btn-primary">Edit</button></a><p><br/></p>
						
					</div>
					
					
					
					</div>
					
				</div>
		
			
			<?php
			}
			?>

	  <!--<footer id="footer">
 
		<div class="container">
   	

			<div class="clear"></div>
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						
					</div>

				</div>
			</div>
		</div>
	</footer>
-->

	
<script>
function makeEditable(){
	var editBefore=document.getElementById('editBefore');
	var editAfter=document.getElementById('editAfter');
	editBefore.style.display="none";
	editAfter.style.display="block";
	
}
function notEditable(){
	var editBefore=document.getElementById('editBefore');
	var editAfter=document.getElementById('editAfter');
	editBefore.style.display="block";
	editAfter.style.display="none";
}

function formValidations(){
	var studentName1=document.getElementById('studentName1').value;
	var major=document.getElementById('major').value;
	var ay=document.getElementById('ay').value;
	var term=document.getElementById('term').value;
	
	var studentName1Error=document.getElementById('studentName1Error');
	var major1Error=document.getElementById('major1Error');
	var ayError=document.getElementById('ayError');
	var termError=document.getElementById('termError');
	
	if(studentName1=='' || major=='' || ay=='' || term==''){
		if(studentName1==''){
			studentName1Error.innerHTML="student name field should not be empty";
		}
		if(major==''){
			major1Error.innerHTML="Major filed should not be empty";
		}
		if(ay==''){
			ayError.innerHTML="Please select academic year";
		}
		if(term==''){
			termError.innerHTML="Please select term";
		}
		return false;
	}
	
	return true;
}
function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
</script>


</body>
</html>
<?php
unset($_SESSION['flag']);
?>