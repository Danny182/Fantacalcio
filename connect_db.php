<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/img/favicon.ico" />
</head>
<?php
include("database.inc");
	//connessione al database fantacalcio
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_query("set names 'utf8'"); 
	if(!$conn){
		echo "Connessione a MYSQL fallita";
		exit();
		}
	else{
		if(!mysql_select_db($dbname, $conn)){
			echo "Errore nella connessione al database";
			exit();
			}
		}
		
	//connessione eseguita
	?>
<body>
</body>
</html>
