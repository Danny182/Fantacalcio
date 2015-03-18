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
$id_team = $_GET['id_team'];
//adesso salvo i giocatori
if (isset($_COOKIE["players"]))
	$players = $_COOKIE ["players"];
else{
	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
	<meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
	die();
}
//elimino tutti i giocatori che aveva quella squadra precedentemente, per evitare duplicati.
$query = "DELETE FROM appartiene WHERE id_squadra='$id_team'";
@$ris = mysql_query($query);

//gli id dei giocatori sono divisi da una virgola
//gestisco gli id dei giocatori
$gioc = explode(',', $players);
//inserisco i giocatori selezionati nella tabella appartiene
foreach ($gioc as $key) {
	$query = "INSERT INTO appartiene VALUES ('$id_team', '$key') ";
	@$ris = mysql_query($query);
}

?>

<div id = "cont-errore">
	<div id = "errore"> Giocatori salvati correttamente 
		<meta http-equiv="Refresh" content="3; URL=../squadre/squadre.php"> 
	</div>
</div>





















