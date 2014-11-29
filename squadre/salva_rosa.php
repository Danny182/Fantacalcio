<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FaYnt | Salva Rosa</title>

<link rel="stylesheet" href="../stili/crea-squadra.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
</head>

<?php 
$id = $_SESSION['id_utente'];
//setto tutti i dati dai cookie pronti per essere salvati
//controllo che siano stati settati tutti i cookie
if(isset($_COOKIE['crea_squadra_nome']))
	$team_name = $_COOKIE['crea_squadra_nome'];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
	<meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
	die();
    }
if (isset($_COOKIE["crea_squadra_stadio"]))
	$team_staduim = $_COOKIE["crea_squadra_stadio"];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    die();
	}
if (isset($_COOKIE["crea_squadra_storia"]))
	$team_story = $_COOKIE["crea_squadra_storia"];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    die();
	}
if (isset($_COOKIE["crea_squadra_urlStadio"]))
	$team_urlStaduim = $_COOKIE["crea_squadra_urlStadio"];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    die();
	}
if (isset($_COOKIE["crea_squadra_urlStemma"]))
	$team_urlStemma = $_COOKIE["crea_squadra_urlStemma"];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    die();
	}

//adesso salvo i giocatori

if (isset($_COOKIE["players"]))
	$players = $_COOKIE ["players"];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    die();
	}
//gli id dei giocatori sono divisi da una virgola
//creo la nuova squadra
//prendo l'id dello stadio

$query = "SELECT id_stadio FROM stadio WHERE stadio.img = '$team_urlStaduim'";
$ris = mysql_query($query);
$row = mysql_fetch_array($ris);
$id_stadio = $row['id_stadio'];

$query = "INSERTO INTO squadra(id_squadra, nome, id_campionato, id_utente, id_stadio, punti, iscritta, storia, logo, nome_stadio)
		 VALUES(NULL, $team_name, NULL, $id, $id_stadio, 0, false, '$team_story', '$team_urlStemma', $team_staduim)";
$ris = mysql_query($query);
if(!$ris){
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA (1)
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
        die();
}
//id della nuova squadra
$query = "SELECT squadra.id_squadra FROM squadra WHERE squadra.nome = '$team_name'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);
$id_newTeam = $vet['id_squadra'];

//gestisco gli id dei giocatori
$gioc = explode(',', $plyers);

$query = "INSERT INTO appartiene "



















