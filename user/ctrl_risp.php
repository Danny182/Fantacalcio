<?php

include("../connect_db.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Controllo</title>
</head>
<?php
$risp = $_POST['risp'];
$user = $_POST['user'];
$destinatario = $_POST['dest'];
//$id = $_SESSION['id'];




$query = "SELECT risposta FROM utente WHERE user ='$user'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);

//se le risposte coincidono invio un email con i dati
if(trim($vet['risposta']) == trim($risp)){
	$query = "SELECT user, password, nome, cognome FROM utente WHERE user='$user'";
	$ris1 = mysql_query($query);
	$vet1 = mysql_fetch_array($ris1);
	$intestazione = "From:barlacchi.gabriele@gmail.com";
	$nome = $vet1['nome'];
	$cognome = $vet1['cognome'];
	$user = $vet1['user'];
	$password = $vet1['password'];
	//invio l'email
	$oggetto = "Recupero dati";
	$dest = trim($destinatario);
	$messaggio = "Buonasera $nome $cognome, ci è stata inviata una richiesta di recupero dati.
				  
				  Password: <b>$password.</b>
				  User name = <b>$user.</b>
				  
				  <i>Grazie e buon divertimento con FantaPV.</i>
				  ";
	if(mail($dest, $oggetto, $messaggio, $intestazione)) {
		echo '<div id = "cont"> <div id = "window">I dati sono stati inviati alla sua casella di Posta elettronica</div></div>
		<meta http-equiv="Refresh" content="3; URL=../index.php">';
	}
	else {
	echo '<div id = "cont"> <div id = "window"> problema con l inio della mail</div></div>
		<meta http-equiv="Refresh" content="3; URL=../index.php">';}
	
	
	
}
//altrimenti do errore
else{
	'<div id = "cont"> <div id = "window"> ATTENZIONE <br>La risposta non coincide con quella Salvata</div></div>
		<meta http-equiv="Refresh" content="3; URL=../rec_dati.php?email=$destinatario">';
}
	?>

<body>
</body>
</html>