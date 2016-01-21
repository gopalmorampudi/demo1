<?php
include("MainClass.class.php");
$object=new MainClass();
$subjectsArray=$object->getAllSubject();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>STEM | Courses</title>
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
				<a class="navbar-brand" href="index.html"></a>
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
                    <h1>Courses</h1>
                    <p></p>
                </div>
    </header>

    

	<div id="courses" style="
    min-height: 400px;
">
		<section class="container">
			<h3>Development Courses</h3>
			
			<?php
									foreach($subjectsArray as $subject){
								?>
				<section class="col-sm-6 maincontent">
					 <div class="featured-box" style="width: 50%;padding: 2px;
    padding-left: 0px;
	margin-bottom: 0px;">  
						 <div class="text"> 
							<div class="panel panel-success">
      <div class="panel-heading">
      	<h3><?=$subject[1]?></h3></div>
    </div>
					 </div> 
					 </div> 
					 </section>
				
				<?php
									}
								?>
				
	

		</section>
	</div>
    
	<div class="container">
		<div class="row">
			<section class="col-sm-6 maincontent">
				<h3></h3>
				<p>
					
				</p>
				<h3></h3>
				<p></p>
			</section>
		</div>
	</div>
 
</body>
</html>
