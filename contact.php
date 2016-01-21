<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>STEM | Contact</title>
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
  <nav class="navbar navbar-static-top" role="navigation">
           <div class="navbar-header">
			
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a href="index.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
			</div>
            
             <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.php">Courses</a></li>
				
					 <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
                            <li><a href="login_student.html">Login</a></li>
                            <li class="active"><a href="studentregister.php">Register</a></li>
                         </ul>
                    </li>
					<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutor<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
                           <li><a href="login.html">Login</a></li>
                            <li class="active"><a href="register_tutor.php">Register</a></li>
                         </ul>
                    </li>
					<li><a href="contact.php">Contact</a></li>                  
                </ul>
            </div>
        </nav>
</div>
</div>


		<header id="head" class="secondary">
            <div class="container">
                    <h1>Contact Us</h1>
                    <p></p>
                </div>
    </header>


	
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">
						<?php
						if(isset($_SESSION['flag'])){
							if($_SESSION['flag']=='success'){
								echo '<span style="color:green">Your enquiry submitted successfully</span>';
							}else{
								echo '<span style="color:red">Your enquiry submission failed try again...!</span>';
							}
						}
						?>
						</h3>
						<p>
						
						</p>
						
						<form class="form-light mt-20" role="form" action="saveEnquiries.php" method="post" onsubmit="return phoneNumberValidation();">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" required class="form-control" placeholder="Your name">
							</div>
							
								
									<div class="form-group">
										<label>Email</label>
										<input type="email" required name="emailid" class="form-control" placeholder="Email address">
									</div>
							
								
									<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Enter Your Phone Number"  onkeypress="noneErrors(phoneNumber,phoneError);" onblur="phonenumber();" maxlength="10">
								<span id="phoneError" style="color:red;"></span>
							</div>
								
							
							<div class="form-group">
								<label>Subject</label>
								<input type="text" required name="subject" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" required name="desc" id="message" placeholder="Write you message here..." style="height:100px;"></textarea>
							</div>
							<button type="submit" class="btn btn-two">Send message</button><p><br/></p>
						</form>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Office Address</h3>
								<div class="contact-info">
									<h5>Address</h5>
									<p></p>
									
									<p>Adam Nogaj</p>
									<p>Gannon University</p>
									<p>ERIE-PA</p>
									 <p>Director, Math Center</p>
									 <p>Adjunct Professor, Mathematics Department</p>
									 <p>Adjunct Professor, Computer & Information Science Department</p>
									 <p>Coach/Advisor, GU Ultimate [Frisbee] Club</p>
									<h5>Email</h5>
									<p>nogaj001@gannon.edu</p>
									
									<h5>Phone</h5>
									<p>814-871-5661</p>
								</div>
							</div> 
						</div> 						
					</div>
				</div>
			</div>
	

	 <footer id="footer">
 
		<div class="container">
  

			<div class="clear"></div>
		
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">


					<div class="col-md-6 panel">
						
					</div>

				</div>
			
			</div>
		</div>
	</footer>
	<script>
	function phoneNumberValidation(){
		var phoneNumber=document.getElementById('phoneNumber').value;
		if(phoneNumber.length<10)
			return false;
		return true;
	}
	function phonenumber()  
{  

 var phoneNumber=document.getElementById('phoneNumber').value;
 if(isNaN(phoneNumber)){ 
 	document.getElementById('phoneError').innerHTML='Please enter valid phone number ';
 	return false;
 }else{
 	if(phoneNumber.length!=10){
 	document.getElementById('phoneError').innerHTML='Please enter 10 digits phone number';
 	return false;
 	}
 }
  }
function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
	</script>




</body>
</html>
<?php unset($_SESSION['flag']); ?>
