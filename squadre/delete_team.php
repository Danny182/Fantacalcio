<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    include("../funzioni/function-squadre.php");
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifica la squadra</title>
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

</head>


<?php

    $id_team = $_GET['idteam'];
    $id_user = $_GET['iduser'];
    //controllo che la squadra non sia collegata ad un campionato
    $query = "SELECT squadra.id_campionato FROM squadra WHERE squadra.id_squadra = '$id_team'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $id_camp = $row['id_campionato'];
    //se id_camp è vuoto la squadra può essere eliminata, altrimento no

    if(empty($id_camp)){
        //la stacco dall'utente
        $query = "UPDATE squadra SET squadra.id_utente = NULL WHERE squadra.id_squadra = '$id_team'";
        $ris = mysql_query($query);
        if($ris){
            //elimino 
            $query = "DELETE FROM squadra WHERE squadra.id_squadra = '$id_team'";
            $ris = mysql_query($query);
            if($ris){
                echo ' <div id = "cont-errore"><div id = "errore"> Squadra eliminata
                <meta http-equiv="Refresh" content="3; URL=squadre.php?var=0"> </div></div>' ;
            }
            else{
                echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> si è verificato un problema
                <meta http-equiv="Refresh" content="3; URL=squadre.php?var=0"> </div></div>' ;
            }
        }
        else{
            echo ' <div id = "cont-errore"><div id = "errore">ATTENZIONE <br> si è verificato un problema
            <meta http-equiv="Refresh" content="3; URL=squadre.php?var=0"> </div></div>';
        }
    }
    else{
        echo ' <div id = "cont-errore"><div id = "errore"> Non puoi eliminare la squadra se è iscritta ad un campionato <br> Parlane prima con l Admin
        <meta http-equiv="Refresh" content="3; URL=squadre.php?var=0"> </div></div>' ;
    }
        ?>










