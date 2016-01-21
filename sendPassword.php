<?php
session_start();
include 'dbconnection.php';
require_once('lib/swift_required.php');
$actor=$_REQUEST['actor'];
	if($actor=='tutor'){
		$emailid=$_REQUEST['username'];
		$sql="select t.emailid,t.password from tutor t where t.emailid='$emailid'";
		$res=mysql_query($sql);
		$email='';
		$password='';
		if($r=mysql_fetch_assoc($res)){
			$email=$r['emailid'];
			$password=$r['password'];
					$br=<<<BR
  Hello\r\n
  your account details are below:-\r\n
  Email id: $email.\r\n
  Password: $password.\r\n
BR;

$new=$br;

$message=Swift_Message::newInstance() ;
$message->setSubject('Acknowledgement');

$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
$message->setTo(array($email =>"STEM"));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
$_SESSION['flag']='success';
header("Location:forgotpassword.php?actor=tutor");
		}else{
			$_SESSION['flag']='emailWrong';
			header("Location:forgotpassword.php?actor=tutor");
		}
	}else if($actor=='student'){
		
		$emailid=$_REQUEST['username'];
		$sql="select s.emailid,s.password from student s where s.emailid='$emailid'";
		$res=mysql_query($sql);
		$email='';
		$password='';
		if($r=mysql_fetch_assoc($res)){
			$email=$r['emailid'];
			$password=$r['password'];
					$br=<<<BR
  Hello\r\n
  your account details are below:-\r\n
  Email id: $email.\r\n
  Password: $password.\r\n
BR;
$new=$br;
$message=Swift_Message::newInstance() ;
$message->setSubject('Acknowledgement');
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
$message->setTo(array($email =>"STEM"));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
$_SESSION['flag']='success';
header("Location:forgotpassword.php?actor=student");
		}else{
			$_SESSION['flag']='emailWrong';
			header("Location:forgotpassword.php?actor=student");
		}
		
	}
?>