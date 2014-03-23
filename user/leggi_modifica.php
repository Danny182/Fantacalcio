<?php
include "../connect_db.php";

//prendo l'id dell utente
$id=$_COOKIE['id'];
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$g_nascita=$_POST["nascita_giorno"];
$m_nascita=$_POST["nascita_mese"];
$a_nascita=$_POST["nascita_anno"];
$citta=$_POST["citta"];
$email=$_POST["email"];
$usern=$_POST["user"];
$password=$_POST["password"];
$domanda=$_POST["domanda"];
$risposta=$_POST["risposta"];
///metto la data di nascita in UNA variabile
$data_nascita=$a_nascita."-".$m_nascita."-".$g_nascita;

//aggiorno i dati all'interno del db
	$sql="UPDATE utente SET nome='$nome', cognome='$cognome',email='$email',data_nascita='$data_nascita',citta='$citta',user='$usern',password='$password',domanda='$domanda',risposta='$risposta' WHERE id_utente='$id';";
	$res = mysql_query($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dati modificati</title>
<link rel="stylesheet" href="../stili/style-leggir.css" type="text/css" media="screen" />
</head>


<body>
	<div id="cont">
		<div id="window">
			Dati modificati correttamente
			<meta http-equiv="Refresh" content="3; ../home.php">
		</div>
	</div>
</body>
</html>
