<?php
session_start();
include "DBConnection.php";
$user=$_SESSION['tutor_id'];
?>
<html>
<head>
	<title>Tutor</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<script>
function fixSchedule(id,dat,day){
	if(id.style.background=='blue'){
		
	}else{
	var str=id.innerHTML;
	var strArr1=str.split('<br>');
	var strArr2=strArr1[0].split('&nbsp;&nbsp;');
	var fperiod=strArr2[1].trim();
	var strArr3=strArr2[0].split(':');
	var fhour=strArr3[0].trim();
	var fminutes=strArr3[1].trim();
	
	
	 strArr2=strArr1[1].split('&nbsp;&nbsp;');
	var tperiod=strArr2[1].trim();
	strArr3=strArr2[0].split(':');
	var thour=strArr3[0].trim();
	var tminutes=strArr3[1].trim();
	
	var queryString='?fhour='+fhour+'&fminutes='+fminutes+'&fperiod='+fperiod+'&thour='+thour+'&tminutes='+tminutes+'&tperiod='+tperiod+'&date='+dat.value+'&day='+day.value;
	 var c=confirm("Do you want to confirm..!");
    if(c){
     sendConformation(queryString,id);
    }
	}
}
function sendConformation(query,id){
  var xhttp;
  if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var result = xhttp.responseText;
	   if(result=='success'){
		 id.style.background="#1D1D5F";
	 }else{
		 alert("sorry due to some problem we are unable to process your request...!");
	 }
    }
  };
  var url="fixSchedule.php"+query;
  xhttp.open("GET", url, true);
  xhttp.send();
}
</script>
</head>
<body>
<h3 class="section-title" id="title_log"></h3>
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
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li class="active"><a href="test.php">Make Schedule</a></li>
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
		<h3 class="section-title" id="title_log"></h3>
    </header>

	<?php
	include('sho_next_schedule.php');
	?>
<br><br><br>
<br>
	</body>
</html>