<?php
session_start();
include "DBConnection.php";
$user=$_SESSION['tutor_id'];
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Tutor | Make schedule</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body onload="checkFlag();">

	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a href="tutor_profile.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li class="active"><a href="test.php">Make schedule</a></li>
					<li><a href="tutorRequest.php">Request to admin</a></li>
					<li><a href="tutor_search_appointments.php">Appointments</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor</h2>
				<h4>Hi <?=$_SESSION['t_name']?></h4>
					
                </div>
    </header>
<h3 class="section-title" id="title_log"></h3>
	<?php
						if(isset($_SESSION['flag'])=='success'){
							?>
							<input type="hidden" name="flag" id="flag" value="<?php echo $_SESSION['flag'];?>">
							<?php
						}else{
							?>
							<input type="hidden" name="flag" id="flag" value="">
							<?php
						}
						?>
	<?php
	include('show_scheduel_test.php');
	?>
	<br><br>
	<script>
function checkFlag(){
	var flag=document.getElementById('flag').value;
	if(flag=='reqsuccess'){
		document.getElementById('title_log').innerHTML="<font color='green'>Your message has been sent successfully</font>";
	}else if(flag=='loginFailed'){
		document.getElementById('title_log').innerHTML="<font color='red'>Due to some issues we are unable to send your request....!</font>";
	}
	
}
</script>
	</body>
</html>
<?php
unset($_SESSION['flag']);
?>