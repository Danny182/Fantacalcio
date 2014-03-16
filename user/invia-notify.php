<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/notify_function.php");
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<title>Invia una notifica</title>



</head>

<?php 
	
	$messaggio = $_POST['messaggio'];
	$dest = $_POST['dest'];
	
	//prendo l'id del mittente
	$id_mittente = $_SESSION['id_utente'];
	//prendo l'id del destinatario
	$query = "SELECT utente.id_utente FROM utente WHERE utente.user = '$dest'";
	$ris = mysql_query($query);
	$row =  mysql_fetch_array($ris);
	$id_dest = $row['id_utente'];
	if(empty($id_dest)){
		echo ' <div id = "cont-errore"><div id = "errore"> User Name Incorretto 
        <meta http-equiv="Refresh" content="3; URL=../notifiche.php"> </div></div>' ;
		die;
	}
	
	//creo la notifica
	$query = "INSERT INTO notifica VALUES(NULL, 'Messaggio', '$messaggio', '0', '$id_mittente', '$id_dest')";
	$ris = mysql_query($query);
	if($ris){
		echo ' <div id = "cont-errore"><div id = "errore"> Messaggio Inviato
        <meta http-equiv="Refresh" content="3; URL=../notifiche.php"> </div></div>' ;
	} 
	else{
		echo ' <div id = "cont-errore"><div id = "errore"> Si è verificato un problema
        <meta http-equiv="Refresh" content="3; URL=../notifiche.php"> </div></div>' ;
	}








?>