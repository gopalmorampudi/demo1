<?php
include 'MainClass.class.php';
$obj=new MainClass();
$megaContainer=$obj->getSubjects();
$userStatus='';
$user=$_SESSION['tutor_id'];
if(isset($_SESSION['tutor_id'])){
$userStatus.=$obj->isScheduled($user);
}
$weekdays=array('Monday','tuesday','Wednesday','Thursday','Friday','Saturday');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Student|Tutor|Register</title>
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
				<a class="navbar-brand" href="index.html">
				</a>
			<span style="color:#3D84E6"><h2>STEM</h2></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li ><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="test.php">Make Shedule</a></li>
					<li class="active"><a href="view_tutor_schedule.php">View Shedule</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</div>
			
		</div>
	</div>
	<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor Schedule</h2>
                    <h4></h4>
                </div>
    </header>
	<div class="container">
				<div class="row">
				
						<h3 class="section-title">Tutor Schedule</h3>
<?php include("test_view_grid.php"); ?>
				</div>
			</div>
 <footer id="footer">
 
		<div class="container">
  
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							
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
	</footer>




</body>
</html>

