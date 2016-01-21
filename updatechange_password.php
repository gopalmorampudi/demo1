<?php
session_start();
include 'DBConnection.php';
 $tutor_email=$_SESSION['tutor_email'];
	  $oldpassword=$_POST['oldpassword'];
	  $newpassword=$_POST['newpassword'];
	  $confpassword=$_POST['confpassword'];
	  $query="select * from tutor where password='$oldpassword' and emailid='$tutor_email'";
		$results=mysql_query($query);
		while($row=mysql_fetch_array($results))
		{
		echo $password=$row['password'];	
		} 
		if($password==$oldpassword)
		{
			if($newpassword==$confpassword)
			{
			$update="update tutor set password='$confpassword' where password='$oldpassword' and emailid='$tutor_email'";
				$run=mysql_query($update);
				$_SESSION['log']='success';	
				header('Location: tutor_changepwd.php');	
			}else{
				$_SESSION['log']='failure';	
				header('Location: tutor_changepwd.php');
			}
		}else{
			$_SESSION['log']='pnotmatched';	
			header('Location: tutor_changepwd.php');
		} 
	
	?>