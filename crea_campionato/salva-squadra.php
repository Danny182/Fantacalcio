<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    @$id_camp = $_GET['id_camp'];
    @$nome_squadra = $_GET['squadra'];
    @$id = $_SESSION['id_utente'];
    
    //prendo l'amministratore del campionato
    $id_admin = get_idadmin($id_camp);
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    foreach($utente as $chiave => $valore){
        @$user .= ucfirst("$valore")." ";
        
    }
    

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iscrivi la squadra</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<?php
    //controllo che la squadra non sia già iscritta al campionato
    $query = "SELECT squadra.id_campionato FROM squadra WHERE squadra.nome = '$nome_squadra' AND squadra.id_utente = '$id'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    if(!empty($row['id_campionato'])){
        
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Non puoi iscrivere questa squadra
        <meta http-equiv="Refresh" content="3; URL=iscrivi-squadra.php?var=1&&squadra='.$nome_squadra.'"> </div></div>' ;
        die;
    }
    
    //iscrivo la squadra al campionato
    $ris = iscrivi_squadra($nome_squadra, $id_camp, $id);
    if($ris == 1){
        //faccio la notifica
        $notifica = ''.$user.' si è appena iscritto al tuo campionato con la squadra '.$nome_squadra.'';
        //mando una notifica all'amministratore del campionato
        $query = "INSERT INTO notifica VALUES('null', 'Iscrizione confermata', '$notifica', '0',  '$id', '$id_admin')";
        @$ris = mysql_query($query);
        echo ' <div id = "cont-errore"><div id = "errore"> Ti sei iscritto con successo, buon divertimento!
        <meta http-equiv="Refresh" content="3; URL=../home.php"> </div></div>' ;
    }
    else{
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
        <meta http-equiv="Refresh" content="3; URL=iscrivi-squadra.php?var=1&&squadra='.$nome_squadra.'"> </div></div>' ;
        
    }
    
    
?>

<body>
</body>
</html>
















