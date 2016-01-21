<?php
session_start();
if(empty($_SESSION['tutor_email']))
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
	<title>Tutor | Tutor Profile</title>
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
				<a href="tutor_profile.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="test.php">Make Schedule</a></li>
					<li><a href="tutorRequest.php">Request to admin</a></li>
					<li><a href="tutor_search_appointments.php">Appointments</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
    include "DBConnection.php";
	$tutor_email=$_SESSION['tutor_email'];
	$sql="select tutor_id,tutor_name,emailid,phone_number,subject,working_hours,working_days from tutor where emailid='$tutor_email'";
 $res=mysql_query($sql);
	if($rs=mysql_fetch_array($res)){
	?>	
		<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor profile</h2>
                    <h4>Hi <?=$_SESSION['t_name']=$rs[1]?></h4>
                </div>
    </header>

	<div id="editAfter" style="display:none;">
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Tutor Profile</h3>
					<form class="form-light mt-20" action="insert_data.php?action=update_profile" method="post" role="form">
							
						<div class="form-group">
								<label>UserName</label>
								<input type="text" class="form-control" name="tutorname" value="<?=$rs[1]?>" >
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" name="email" class="form-control" value="<?php echo $rs[2]?>" readonly>
									</div>
								</div>
								
							</div>
                             <div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phno" class="form-control" value="<?php echo $rs[3]?>" maxlength="10">
							</div>
							<div class="form-group" >
								<label>Select Courses</label><br>
	                 <?php  $subj.=$rs['subject'];
$sql1="select subject_id,subject_name from subject order by subject_name";
$result1=mysql_query($sql1);

while($proarray1=mysql_fetch_row($result1)){

	$a=strstr($subj,$proarray1[0]);
if($a){
	?>
	<input type="checkbox" checked='checked' name="subject[]" value="<?=$proarray1[0]?>" /><?php echo $proarray1[1]?> &nbsp;
	<?php
}else{
	?>
	<input type="checkbox" name="subject[]" value="<?=$proarray1[0]?>"/><?php echo $proarray1[1]?> &nbsp;
	<?php
}
}
?>

</div>	
<!-- 
<div class="form-group">
								<label>Working Hours</label>
								<input type="text"class="form-control" name="hours" value="<?php echo $rs[5]?>"  >
							</div> -->
							
							<div class="form-group">
								<label>Working Hours</label>
								<select class="form-control" name="hours">
								<option value="">Select Hours</option>
								  <option value="01" <?=($rs[5]==01)?"selected":''?>>1</option>
								   <option value="02" <?=($rs[5]==02)?"selected":''?>>2</option>
								   <option value="03" <?=($rs[5]==03)?"selected":''?>>3</option>
								<option value="04" <?=($rs[5]==04)?"selected":''?>>4</option>
								<option value="05" <?=($rs[5]==05)?"selected":''?>>5</option>
								<option value="06" <?=($rs[5]==06)?"selected":''?>>6</option>
								<option value="07" <?=($rs[5]==07)?"selected":''?>>7</option>
								<option value="08" <?=($rs[5]==08)?"selected":''?>>8</option>
							</select>
							<span id="WHoursError" style="color:red;"></span>

							</div>
							
								
<div class="form-group">
								<label>Working Days</label><br/>
								<?php
									$days=$rs[6];
									$weekDaysArray=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
								foreach($weekDaysArray as $day){
								?>
								<input type="checkbox" name="days[]" <?=(strstr($days,$day))?'checked':''?> value="<?=$day?>"/><?=$day?>&nbsp;&nbsp;&nbsp;		
								<?php 
								}
								?>
							</div>							
							
						<button type="submit" name="edit" class="btn btn-two">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="cancel" class="btn btn-two" value="Cancel" onclick="notEditable()">
						<p><br/></p>
							<p><br/></p>
						</form>
	<?php }?>
					</div>
					<div class="col-md-6">
					<h3 class="section-title">Expertize your courses</h3>
					<br>
						<form class="form-light mt-20" action="course-expe.php" method="post" role="form">
		<?php 
					$sql1="select DISTINCT subject_id,subject_name,ce.expertize from subject s,courses_experience ce where s.subject_id=ce.course_id and ce.tutor_id=".$_SESSION['tutor_id']." order by subject_name";
					$result1=mysql_query($sql1);
$h=0;
while($proarray1=mysql_fetch_row($result1)){

	$a=strstr($subj,$proarray1[0]);
		?>
		<label><?=$proarray1[1]?></label>
		
		<input type="hidden" name="course<?=$h?>" value="<?=$proarray1[0]?>"/>
		<input type="radio" name="expe<?=$h?>" value="Avarage" <?=($proarray1[2]=='Avarage')?'checked':''?>/>Avarage &nbsp;
		<input type="radio" name="expe<?=$h?>" value="OK" <?=($proarray1[2]=='OK')?'checked':''?>/>OK &nbsp;
		<input type="radio" name="expe<?=$h?>" value="Expert" <?=($proarray1[2]=='Expert')?'checked':''?>/>Expert &nbsp;
		<br>
		<?php
		$h++;
}

?>
<input type="hidden" name="hcount" value="<?=$h?>"/>
					<button type="submit" name="edit" class="btn btn-two">Update</button>		
						</form>
					</div>
					
				</div>
			</div>
			</div>
			<!-- editBefore -->
			<div id="editBefore">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Tutor Profile</h3>
					
							<div class="form-group">
								<label>UserName</label>
								<input type="text" class="form-control" name="tutorname" value="<?=$rs[1]?>" readonly>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" name="email" class="form-control" value="<?php echo $rs[2]?>" readonly>
									</div>
								</div>
								
							</div>
                             <div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phno" readonly class="form-control" value="<?php echo $rs[3]?>" >
							</div>
							<div class="form-group" >
								<label>Select Courses</label><br>
	                 <?php  $subj.=$rs['subject'];
$sql1="select subject_id,subject_name from subject order by subject_name";
$result1=mysql_query($sql1);

while($proarray1=mysql_fetch_row($result1)){

	$a=strstr($subj,$proarray1[0]);
if($a){
	?>
	<input type="checkbox" checked='checked' disabled="disabled"  name="subject[]" value="<?=$proarray1[0]?>" /><?php echo $proarray1[1]?> &nbsp;
	<?php
}else{
	?>
	<input type="checkbox" name="subject[]" disabled="disabled"  value="<?=$proarray1[0]?>"/><?php echo $proarray1[1]?> &nbsp;
	<?php
}
}
?>

</div>	

<div class="form-group">
								<label>Working Hours</label>
								<input type="text"class="form-control" readonly name="hours" value="<?php echo $rs[5]?>"  >
							</div>	
<div class="form-group">
								<label>Working Days</label><br/>
								<?php
									$days=$rs[6];
									$weekDaysArray=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
								foreach($weekDaysArray as $day){
								?>
								<input type="checkbox" disabled="disabled" name="days[]" <?=(strstr($days,$day))?'checked':''?> value="<?=$day?>"/><?=$day?>&nbsp;&nbsp;&nbsp;		
								<?php 
								}
								?>
							</div>							
							
						<button  name="edit" onclick="makeEditable();" class="btn btn-two">Edit</button><p><br/></p>
							
					

					</div>
					<div class="col-md-6">
					<h3 class="section-title">Expertize your courses</h3>
					<br>
						<form class="form-light mt-20" action="course-expe.php" method="post" role="form">
		<?php 
					$sql1="select DISTINCT subject_id,subject_name,ce.expertize from subject s,courses_experience ce where s.subject_id=ce.course_id and ce.tutor_id=".$_SESSION['tutor_id']." order by subject_name";
					$result1=mysql_query($sql1);
$h=0;
while($proarray1=mysql_fetch_row($result1)){

	$a=strstr($subj,$proarray1[0]);
		?>
		<label><?=$proarray1[1]?></label>
		
		<input type="hidden" name="course<?=$h?>" value="<?=$proarray1[0]?>"/>
		<input type="radio" name="expe<?=$h?>" value="Avarage" <?=($proarray1[2]=='Avarage')?'checked':''?>/>Avarage &nbsp;
		<input type="radio" name="expe<?=$h?>" value="OK" <?=($proarray1[2]=='OK')?'checked':''?>/>OK &nbsp;
		<input type="radio" name="expe<?=$h?>" value="Expert" <?=($proarray1[2]=='Expert')?'checked':''?>/>Expert &nbsp;
		<br>
		<?php
		$h++;
}

?>
<input type="hidden" name="hcount" value="<?=$h?>"/>
						</form>
					</div>
					
				</div>
			</div>
			</div>
			<!-- /editBefore -->

	<!--  <footer id="footer">
 
		<div class="container">
  
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
						<div class="panel-body">
							<p class="text-right">
								
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</footer>-->


	

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
</script>

</body>
</html>
