<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FaYnt | Controllo Login</title>

<link rel="stylesheet" href="../stili/style-leggir.css" type="text/css" media="screen" />

</head>
<body>
<?php
session_start();
	include("../connect_db.php");
	//sono get perchè devo inviare i dati anche da rec_dati nel caso l'email sia errata e non posso farlo con post
	$password = $_GET['password'];
	$username = $_GET['usern'];
	
	//se è stato premuto il recupera dati visualizzo la pagine rec_dati
	if($_GET['recupera']){
		
		echo '<div id = "cont"> <div id = "window1"> Inserisci la tua E-mail <br><br>
		<form action = "rec_dati.php" method = "GET">
		<input type = "text" name = "email" id = "email" size= "40" /><br><br><br>
		<input type = "submit" name = "invia" value = "Recupera" class = "reg" />
		</div></div>			';
		}
	else{
	$query = "SELECT user, id_utente FROM utente WHERE user = '$username' AND password = '$password'";
	$ris = mysql_query($query, $conn) or die (mysql_error());
	
	$vet = mysql_fetch_array($ris);
	
	$user = $vet['user'];
	$id_utente = $vet['id_utente'];
	//effettuo il controllo
	
	if($user == NULL) $trovato = 0;
	else $trovato = 1;
	
	//A questo punto username e password sono corretti, registro la sessione
	if($trovato == 1){
	
	$_SESSION['user'] = $user;
	$_SESSION['id_utente']=$id_utente;
	$_SESSION['login_ok'] = true;
	//passo var=0 per capire che si viene dall'index
	echo '<div id = "cont"> <div id = "window"> Login effettuato
		<meta http-equiv="Refresh" content="3; URL=../home.php?var=0">';
	}
	//altrimenti username e password non corrispondono 
	else {
		echo '<div id = "cont"> <div id = "window"> Password e User Name sono errati
		<meta http-equiv="Refresh" content="3; URL=../index.php">';
		
		}
	}
?>		

