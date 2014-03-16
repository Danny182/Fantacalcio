<?php
include("../session.php");
include("../connect_db.php");
$n_part = $_SESSION['n_part'];
$var = 0;
$ctrl_user = 0;
//dati che mi sevono per sapere se è un'email o uno username
$chioc = '@';
$id_camp = $_POST['id'];
//dati del campionato
$query = "SELECT admin, nome, password FROM campionato WHERE id_campionato = '$id_camp.'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);
$admin =  $vet['admin'];
//prendo l'id dell'admin del campionato
$query = "SELECT id_utente FROM utente WHERE user='$admin'";
$res = mysql_query($query);
$ad = mysql_fetch_array($res);
$id_admin = $ad['id_utente'];


$query = "SELECT user FROM utente";
$ctrl = mysql_query($query);
//controllo che gli utenti immessi siano salvati nei db

//
for($i = 1; $i <= $n_part; $i++){
	$utente = $_POST['giocatore'.$i.''];
	$pos = strpos($utente, $chioc);
	if($pos == false){
	//$utente = $_POST['giocatore'.$i.''];
	$query = "SELECT user FROM utente WHERE user = '$utente'";
	$ctrl = mysql_query($query);
	$vet_ctrl = mysql_num_rows($ctrl);
	if($vet_ctrl == 0){
		echo '<div id = "cont-error"> <div id = "window"> ATTENZIONE <br> Almeno un Username inserito non esiste				<meta http-equiv="Refresh" content="3; URL=insert_utenti.php">';
	break;
	
	}
	
	
	
	
		
		//controllo se c'è una chiocciola
	
	
	
		
		//seleziono l'utente
		$query = "SELECT id_utente FROM utente WHERE user = '$utente'";
		$ros = mysql_query($query);
		$vet2 = mysql_fetch_array($ros);
		$id_user = $vet2['id_utente'];
		
		$nome_camp = $vet['nome'];
		
		$password = $vet['password'];
		
		/*$notifica = "Buongiorno! <br> Le è stato appena recapitato un invito a partecipare al campionato 
					 chiamato: $nome dall'admin della lega: $admin.<br>
					 Per partecipare al campionato basta eseguire il login al sito ed entrare nella home personale.<br>
					 Nel menù a sinistra troverà una barra di ricerca dove potrà inserire il nome del campionato,
					 cliccare ed entrare.
					 Le verrà richiesta una password, che è la seguente:$password.<br>
					 A questo  punto basta cliccare su iscriviti, e la procedura è finita.
					 Grazie per l'Attenzione.
					 Buon Fantacalcio!";*/
		$notifica = "Eciaooooo ";
			
			
		//creo la notifica			 
		$query = "INSERT INTO notifica VALUES ('null', '$notifica', '0', '$id_admin', '$id_user')";
		$ris = mysql_query($query);
		if(!$ris) $var = 1;
		
		}
	
	else {
		$query = "SELECT admin, nome, password FROM campionato WHERE id_campionato = '$id_camp.'";
		$ris = mysql_query($query);
		$vet = mysql_fetch_array($ris);
		$nome = $vet['nome'];
		$admin =  $vet['admin'];
		$password = $vet['password'];
		$destinatario = $utente;
		$oggetto = "Invito al Campionato Fanta PV";
		$intestazione = "From:barlacchi.gabriele@gmail.com";
		$header = "MIME-Version: 1.0\n";
		$header .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
		$header .= "Content-Transfer-Encoding: 7bit\n\n";
		
		$messaggio = "FANTA PV
					  Buonasera! Le è appena stato inoltrato un invito a partecipare al campionato $nome, dall'amministratore dellalega : $admin.
					  Per inziziare a giocare occore registrarsi al nostro sito. 127.0.0.1/sito/user/reg.html.
					  Dopo essersi registrato, verrà indirizzato nella sua home personale, dove sulla sinistra potrà trovare un menù da cui può cercare i campionato del sito.
					  Inserisce nella barra della ricerca il nome del campionato scritto sopra e acceda.
					  Le verrà richiesta la password della lega.
					  PASSWORD = $password (non la perda!).
					  A questo punto è entrato uffucialmente a far parte della lega.
					  Buon divertimento! ";
					  
					  
		if(mail($destinatario, $oggetto, $messaggio, $intestazione)) $var = 0;
		else $var = 0;
		
	}
	}

	if( $var == 0){
		echo '<div id = "cont-error"> <div id = "window"> I messaggi sono stati recapitati correttamente <br> Attendere le conferme, Procedura finita var = '.$var.'
		<meta http-equiv="Refresh" content="3; URL=area_campionato.php">';
	}
	
	if(   $var == 1){
		echo '<div id = "cont-error"> <div id = "window"> ATTENZIONE <br> ci sono stati dei problemi var = '.$var.'
				<meta http-equiv="Refresh" content="3; URL=insert_utenti.php">';
	}



?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<title>Invito giocatori</title>
</head>

<body>
</body>
</html>