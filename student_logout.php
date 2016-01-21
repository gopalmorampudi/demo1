<?php
session_start();
unset($_SESSION['student_email']);
header("Location:login_student.html");
?> 