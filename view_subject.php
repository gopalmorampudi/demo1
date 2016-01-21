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
	<title>Student | Make appointment</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	
<script src="jquery-1.9.0.min.js"></script>
<script>
var subID='';
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
var tutorID;
function f(id){
	tutorID=id.id;
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
  var url="student_view_tutor_grid.php?type=getTutorSchedule&id="+id.id+"&sid="+document.getElementById('sid').value;
xmlhttp.open("GET",url,true);
xmlhttp.send();

}
function getNextGrid(){
	 
	 var sid=document.getElementById('sid').value;
	 var date=document.getElementById('nextDate').value;
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
    document.getElementById("grid").innerHTML=xmlhttp.responseText;
    }
  }
  var url="show_student_next_grid1.php?date="+date+"&id="+tutorID+"&sid="+sid;
  
xmlhttp.open("GET",url,true);
xmlhttp.send();
	
 }
 function getPreviousGrid(){
	 var sid=document.getElementById('sid').value;
	 var date=document.getElementById('nextDate').value;
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
  var url="student_view_tutor_grid.php?type=getTutorSchedule&id="+tutorID+"&sid="+sid;
xmlhttp.open("GET",url,true);
xmlhttp.send();
 }
</script>

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
					<li class="active"><a href="view_subject.php">Make appointment</a></li>
					<li><a href="student_search_appointments.php">Appointments</a></li>
					<li><a href="become_tutor_req.php">Become tutor</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li><a href="student_logout.php">Logout</a></li>
				</ul>
			</div>
			
		</div>
	</div>


		<header id="head" class="secondary">
            <div class="container">
                    <h1>View Courses</h1>
                      <h4>Hi <?=$_SESSION['student_name']?></h4>
                </div>
    </header>

	<div class="container container-ht1"  style="min-height: 400px;" >
				<div class="row">	
                    <br/>	<h3 class="section-title" id="title_log">
						<?php
						if(isset($_SESSION['req'])){
							if($_SESSION['req']=='requestSuccess'){
								echo '<font color="green">Your request has been sent successfully</font>';
							}else{
								echo '<font color="red">Request sending failed</font>';
							}
						}
						?>
					</h3>
                    <div class="col-md-4"></div>
								<div class="col-md-6">
								<div class="row">
								<label>Select Course</label>
                                    <br/>
								<select class="form-control" name="subject" onChange="showTutor(this);" id="sid">
									<option value="">Select Course</option>
										<?php
										 $sql="select * from subject -- where dept_id='$dept'";
										$result=mysql_query($sql);
										while($res=mysql_fetch_array($result)){
										?>
										<option value="<?=$res['subject_id']?>"><?=$res['subject_name']?></option>
										<?php
										}
									?>
									</select>
							</div>
                                    <br/>
                                <div class="row">
                                    <div class="col-md-4">
                                        
							<input type="checkbox" name="checkCourse" id="checkCourse" value="courseNotExists" onchange="disp(this,limited)">&nbsp;<span>Course Unavailable</span>
                                        </div>
                                    <div class="col-md-5">
							<input type="checkbox" name="limited" id="limited" value="limited" onchange="disp(this,checkCourse)">&nbsp;<span>Course Coverage limited</span>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-4">
								<div>
							
								</div>
								</div>
							</div>

        
        <div class="container" id="appGrid">
			<div class="row">
                <div class="col-md-4"></div>		
				<div class="col-md-6">
			<div id="output1"></div>
					
                </div>		 
            </div>
				<div class="row">
	<div id="output2"></div>
	</div>
	

</div>
    
   <div class="row" style="display:none" id='dispTextBox'>
    <div class="col-md-4"></div>
<div class="col-md-5">
    <div class="row">
    <form action="course-notifications.php" method="post">
<input type="hidden" name="optionType" id="optionType"><br>
<textarea name="courseNotThere" rows="5" cols="50" required ></textarea><br>
<button type="submit">submit</button>
</form></div></div>
</div> 
    </div>

<script>
function disp(id,id2){
	if(id.checked==true){
		if(id2.checked==true) id2.checked=false;
		document.getElementById('dispTextBox').style.display="block";
		document.getElementById('optionType').value=id.value;
		document.getElementById('appGrid').style.display="none";
	}
	else{
		document.getElementById('dispTextBox').style.display="none";
		document.getElementById('appGrid').style.display="block";
	}
}

function disp1(id){
	if(id.checked==true){
		document.getElementById('selectForm').style.display="block";
	}else{
		document.getElementById('selectForm').style.display="none";
	}
}
</script>
</body>
</html>
<?php
unset($_SESSION['req']);
?>