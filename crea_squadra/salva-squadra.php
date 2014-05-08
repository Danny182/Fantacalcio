<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    $id = $_SESSION['id_utente'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salvataggio Squadra</title>

<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />


<?php

//prendo i dati dal form
    if(isset($_GET['nome_squadra'])) $nome_squadra = $_GET['nome_squadra'];
    if(isset($_GET['stadio'])) $nome_stadio = $_GET['stadio'];
    if(isset($_GET['storia'])) $storia = $_GET['storia'];
    if(isset($_GET['url_stadio'])) $url_stadio = $_GET['url_stadio'];
    if(isset($_GET['url_stemma'])) $url_stemma = $_GET['url_stemma'];
    
    //controllo che il nome della squadra non esista già
    $query = "SELECT count(id_squadra) as num FROM squadra WHERE squadra.nome = '$nome_squadra'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    if($row['num'] != 0){//c'è almeno una squadra con lo stesso nome
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Il nome della squadra è già utilizzato
        <meta http-equiv="Refresh" content="3; URL=crea-squadra.php"> </div></div>' ;
    }
    else{
    //salvo i dati nel db
    //prendo l'id dello stadio scelto dall'utente
    $query = "SELECT id_stadio FROM stadio WHERE stadio.img = '$url_stadio'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $id_stadio = $row['id_stadio'];
    
    //inserimento
    $query = "INSERT INTO squadra VALUES (NULL, '$nome_squadra', NULL, '$id', '$id_stadio', '0' , 'false', '$storia', '$url_stemma', '$nome_stadio')";
    $ris = mysql_query($query);
    if(!$ris){
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
        <meta http-equiv="Refresh" content="3; URL=crea-squadra.php"> </div></div>' ;
        }
    else{
        echo ' <div id = "cont-errore"><div id = "errore"> Procedura eseguita con successo!
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    }
    }
?>
</head>
<body> </body>
</html>
    

