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
    //faccio dei controlli nel caso l'utente avesse inserito campi vuoti
    if(empty($_POST['squadra'])) $nome_squadra = $_POST['nome_squadra'];//ci rimetto quello che c'era prima
    else $nome_squadra = $_POST['squadra'];
    
    if(empty($_POST['stadio'])) $nome_stadio = $_POST['nome_stadio'];//ci rimetto quello che c'era prima
    else $nome_stadio = $_POST['stadio'];
    
    if(empty($_POST['storia'])) $storia = $_POST['storia_squadra'];//ci rimetto quello che c'era prima
    else $storia = $_POST['storia'];
    
    //questi sono settati per forza
    $url_stadio = $_POST['url_stadio'];
    $url_stemma = $_POST['url_stemma'];
    
    $old_nome = $_POST['nome_squadra'];
    
  
    
    
    //controllo che il nome della squadra non esista già
    $query = "SELECT count(id_squadra) as num FROM squadra WHERE squadra.nome = '$nome_squadra'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    if($row['num'] > 1){//c'è almeno una squadra con lo stesso nome
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Il nome della squadra è già utilizzato
        <meta http-equiv="Refresh" content="3; URL=squadre.php"> </div></div>' ;
    }
    else{
        //salvo i dati nel db
        //prendo l'id dello stadio scelto dall'utente
        $query = "SELECT id_stadio FROM stadio WHERE stadio.img = '$url_stadio'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        $id_stadio = $row['id_stadio'];
        
        //inserimento
        $query = "UPDATE squadra SET squadra.nome = '$nome_squadra', squadra.storia = '$storia', squadra.nome_stadio = '$nome_stadio' WHERE squadra.nome = '$old_nome' ";
        $ris = mysql_query($query);
        if(!$ris){
            echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
            <meta http-equiv="Refresh" content="3; URL=squadre.php"> </div></div>' ;
        }
        else{
            echo ' <div id = "cont-errore"><div id = "errore"> Modifiche eseguite!
            <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
        }
    }
    ?>
</head>
<body> </body>
</html>

