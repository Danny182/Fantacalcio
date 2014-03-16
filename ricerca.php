<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include("connect_db.php");
	$campionato = $_POST['camp'];
	
	$query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome='$campionato'";
	$ris = mysql_query($query);
	$vet = mysql_fetch_array($ris);
	$valore = $vet['id_campionato'];
	
	
	if(empty($vet['id_campionato'])){ header("Location: home.php?var=1&id=vuoto");}
	
	else header("Location: home.php?var=1&id=$valore");
	
	?>
</body>
</html>