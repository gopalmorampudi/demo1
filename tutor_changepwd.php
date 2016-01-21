<?php
session_start();
if(empty($_SESSION['tutor_email']))
header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Tutor | Change Password</title>
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
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="test.php">Make schedule</a></li>
					<li><a href="tutorRequest.php">Request to admin</a></li>
					<li><a href="tutor_search_appointments.php">Appointments</a></li>
					<li class="active"><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
	
		</div>
	</div>

		<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor Change Password</h2>
                    <h4>Hi <?=$_SESSION['t_name'];?> </h4>
                </div>
    </header>


		
	<div class="container">
				<div class="row">
					<div class="col-md-6">

						<h3 class="section-title">
											<?php
			if(isset($_SESSION['log'])=="success")
			{
			?>
			<span style="color:green;">Updated Password Successfully</span>
			<?php
			unset($_SESSION['log']);
			}else{
				echo 'Change Password';
			}
			
			?></h3>
						<form class="form-light mt-20" action="updatechange_password.php" 
						onsubmit="return changePasswordValidations()" method="post" role="form">
							<div class="form-group">
								<label>Old Password</label>
								<input type="password" id="oldPass" class="form-control" name="oldpassword">
							</div>
							
							<div class="form-group">
								<label>New Password</label>
								<input type="password"  id="newPass" class="form-control" name="newpassword">
							   
							</div>
							
									<div class="form-group">
										<label>Conform Password</label>
										<input type="password"  id="confPass" class="form-control" name="confpassword" >
									
							</div>
                             
							<button type="submit" name="action" value="update_profile" class="btn btn-two">Update</button><p><br/></p>
							
						</form>

					</div>
					
				</div>
			</div>

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
	function changePasswordValidations(){
		var oldPass=document.getElementById('oldPass').value;
		var newPass=document.getElementById('newPass').value;
        var confPass=document.getElementById('confPass').value;
		if(oldPass=='' || newPass=='' || confPass==''){
				if(oldPass==''){
					alert("Please fill Old password field");
				}
				if(newPass==''){
					alert("Please fill New password field");
				}
				if(confPass==''){
					alert("Please fill Confirm password field");
				}
				return false;
		}
		if(newPass!=confPass){
				alert("New password and confirm password mismatch");
				return false;
			}
		return true;
	}
</script>


</body>
</html>
