<?php
include("../session.php");
include("../connect_db.php");

//prendo nome e cognome dell'utente
$id_user = $_SESSION['id_utente'];
$query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente='$id_user'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);
$user = ucfirst($vet['nome'])." ".ucfirst($vet['cognome']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salavataggio Regole</title>
</head>
<?php
	$id_camp = $_POST['id'];
	$rigore_pa = $_POST['rigore_pa'];
	$rigore_sb = $_POST['rigore_sb'];
	$autogol = $_POST['autogol'];
	$formazione = $_POST['formazione'];
	$voti = $_POST['voti'];
	$penalita = $_POST['penalita'];
	
	
	//se il valore della riga formazione è "si" vuoldire che ad ogni giornata il sistema riprende l'utima formazione titolare data, se è "no", il giocatore perde automaticamente e viene inflitta l'eventuale penalità
	$query = "UPDATE campionato SET rigore_pa = '$rigore_pa', rigore_sb = '$rigore_sb', autogol = '$autogol', formazione = '$formazione', voti = '$voti', penalita = '$penalita' WHERE id_campionato = '$id_camp'";
	$ris = mysql_query($query);
	
	if(!$ris){
		echo '<div id = "cont-error"> <div id = "window"> ATTENZIONE <br> si è verificato un errore (mysql)
		<meta http-equiv="Refresh" content="3; URL=crea_regole.php">';
	}
	
	else {
		echo '<div id = "cont-error"> <div id = "window"> Salvataggio eseguito <br> Completa l ultimo passo!
		<meta http-equiv="Refresh" content="3; URL=insert_utenti.php?id_camp='.$id_camp.'">';
		
	}
	
	?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
<body>
</body>
</html>