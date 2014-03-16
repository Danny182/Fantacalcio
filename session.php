<?php
session_start();
if (!$_SESSION['login_ok']) {
  echo '<div id = "cont-error"> <div id = "window"> ATTENZIONE <br> Almeno un Username inserito non esiste				<meta http-equiv="Refresh" content="3; URL=index.php">';
  
}
?>


<html>
	<head>
<link rel="shortcut icon" href="/favicon.ico" />
		
	</head>
