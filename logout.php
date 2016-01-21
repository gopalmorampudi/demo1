<?php
session_start();
unset($_SESSION['adminuser']);
unset($_SESSION['tutor_email']);
unset($_SESSION['t_name']);
header('Location: login.html');
?>