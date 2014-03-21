<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../stili/style-leggir.css" />
</head>

<body>
<?php
	$_SESSION["login_ok"] = false;
	
	echo'<div id = "cont"><div id = "window">
				log out effettuato
				<meta http-equiv="Refresh" content="3; URL=../index.php">
		</div></div>';
	
?>
</body>
</html>
