<?php
session_start();
if (!isset($_SESSION['login_ok'])) 
	header("location: http://localhost/fantacalcio/index.php");
  



?>


<html>
	<head>
<link rel="shortcut icon" href="/favicon.ico" />
		
	</head>
