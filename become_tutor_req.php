<?php
include("MainClass.class.php");
$object=new MainClass();
$subjectsArray=$object->getAllSubject();
?>
<?php
include"dbconnection.php";
$student_email=$_SESSION['student_email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Student | Become tutor</title>
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
					<li><a href="Student_profile.php">View Profile</a></li>
					<li><a href="view_subject.php">Make appointment</a></li>
					<li><a href="student_search_appointments.php">Appointments</a></li>
					<li class="active"><a href="become_tutor_req.php">Become tutor</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li><a href="student_logout.php">Logout</a></li>
				</ul>
			</div>
			
		</div>
	</div>
	

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Do you want to become a tutor</h1>
									 <h4>Hi <?=$_SESSION['student_name']?></h4></a>

                    
                </div>
    </header>
		
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title" style="color:green;">
						<?php
						if(isset($_SESSION['flag'])){
							if($_SESSION['flag']=='success'){
								echo 'Your request has been sent to admin, admin will contact you soon';
							}else if($_SESSION['flag']=='failed'){
								echo '<font color="red">Sorry we are unable to send you request</font>';
							}
						}
					?>
						</h3>
						
						
						<form class="form-light mt-20" method="post" onsubmit="return checkForm();" action="send_become_tutor_req.php" role="form" >
							
							<div class="form-group">
								<label>Select courses you want to guide :</label><br>
								
								<?php
								$i=0;
									foreach($subjectsArray as $subject){
								?>
								<input type="checkbox" name="subject[]" onchange="chechNoneError();" id="sub<?=$i?>" value="<?=$subject[0]?>"><?=$subject[1]?>&nbsp;&nbsp;
								<?php
								$i++;
									}
								?>
								<span id="subError" style="color:red;"></span>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phone_number" id="phone" class="form-control" placeholder="Enter Your Phone Number" onkeypress="noneErrors(phone,phoneError)" maxlength="10">
								<span id="phoneError" style="color:red;"></span>
							</div>
							<div class="form-group">
								<label>Description :</label>
								<textarea rows="5" cols="30" name="desp" id="desc" placeholder="Enter some description about your skills" class="form-control" 
								onkeypress="noneErrors(desc,descError)"></textarea>
								<span id="descError" style="color:red;"></span>
							</div>
							 <div class="form-group">
								<label>Working Hours</label>
								<select class="form-control" name="working_hours" id="wh" onchange="noneErrors(wh,WHoursError);" >
								<option value="">Select Hours</option>
								  <option value="01">01</option>
								   <option value="02">02</option>
								   <option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
							</select>
							<span id="WHoursError" style="color:red;"></span>

							</div>
							 <div class="form-group">
								<label>Working Days</label><br>
								<?php
								$j=0;
								$weekDaysArray=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
								foreach($weekDaysArray as $day){
								?>
								<input type="checkbox" onchange="noneErrors(d<?=$j?>,WDaysError);" id="d<?=$j?>" name="working_days[]" value="<?=$day?>"/><?=$day?>&nbsp;&nbsp;&nbsp;								
								<?php 
								$j++;
								}
								?><span id="WDaysError" style="color:red;"></span>
							</div>
							
							
							
							
							
							
							<button type="submit" name="action" class="btn btn-two">Submit</button><p><br/></p>
						</form>
					</div>
				</div>
			</div>
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
function checkForm(){
	var subChecks = document.getElementsByName('subject[]');
			var subCount=0;
			for(var i=0;i<subChecks.length;i++){
				if(document.getElementById('sub'+i).checked){
					subCount++;
				}
			}
			
			var weekChecks = document.getElementsByName('working_days[]');
			var weekCount=0;
			for(var i=0;i<weekChecks.length;i++){
				if(document.getElementById('d'+i).checked){
					weekCount++;
				}
			}
			
			var phone = document.getElementById('phone').value;
			var desc = document.getElementById('desc').value;
			var wh=document.getElementById('wh').value;
			if(phone == '' || desc == '' || wh=='' || subCount==0 || weekCount==0){
				if(phone==''){
					document.getElementById('phoneError').innerHTML='Please enter your phone number';
				}
				if(desc==''){
					document.getElementById('descError').innerHTML='Please enter some description about you skills';
				}
				if(subCount==0){
				document.getElementById('subError').innerHTML='Please select any one of course';
				}
				if(weekCount==0){
					document.getElementById('WDaysError').innerHTML='Please select at least one week day';
				}
				if(wh==''){
					document.getElementById('WHoursError').innerHTML='Please fill working hours field';
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
function chechNoneError(){
	var subChecks = document.getElementsByName('subject[]');
			var subCount=0;
			for(var i=0;i<subChecks.length;i++){
				if(document.getElementById('sub'+i).checked){
					subCount++;
				}
			}
			if(subCount!=0){
				document.getElementById('subError').innerHTML='';
			}
}

</script>


</body>
</html>
<?php
unset($_SESSION['flag']);
?>