 <?php
    
    include("../session.php");
    include("../connect_db.php");
    include("../funzioni/admin_area_function.php");
    include("../funzioni/gest_campionato_function.php");
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />


</head>

<?php


    $id_mitt = $_POST['id_mitt'];
    $nome_camp = $_POST['nomecamp'];
    $messaggio = $_POST['messaggio'];
    //prendo l'id del campionato
    $query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome = '$nome_camp'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $id_camp = $row['id_campionato'];
    
    $dest = $_POST['dest'];
    if(check_email($dest)){
        //il destinatario è un email
        //TODO
    }
    else{ //è un username
        if(!$dest){
           echo' <div id="cont-errore"><div id="errore">Destinatario non Valido
            <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"></div></div>';
        }
        else{
            //controllo che l'username esista nel database
            $query = "SELECT count(utente.id_utente) as num, utente.id_utente FROM utente WHERE utente.user = '$dest'";
            $ris = mysql_query($query);
            $row = mysql_fetch_array($ris);
            $id_dest = $row['id_utente'];
            if(empty($row['num'])){ //user insesistente
                echo'<div id="cont-errore"><div id="errore">User Name Inesistente
                <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"></div></div>';
            }
            else{ //tutto ok
            //prendo tutti i dati
            //username dell admin
            $admin = get_admin($id_camp);
            
            //creo la notifica
            $notifica = 'Sei stato invitato ad unirti al torneo '.$nome_camp.'  dall amministratore della lega <br>'.$admin.'
            Per unirti ai tuoi amici basta cliccare nel link sotto e seguire le indicazioni, in pochi minuti il gioco è fatto!<br>
            Buon divertimento!<br>';
            $notifica .= ' '.$messaggio.' ';
            $notifica .= '<a href = "crea_campionato/iscrivi-squadra.php?id_camp='.$id_camp.'&&var=0">Iscrivi la tua squadra al campionato</a>';
            
                
            $query = "INSERT INTO notifica VALUES('null', 'invito al campionato', '".addslashes($notifica)."', 'false', '$id_mitt', '$id_dest')";
            $ris = mysql_query($query);
            if(!$ris){
                echo'<div id="cont-errore"><div id="errore">Si è verificato un problema
                <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"></div></div>';
                }
            else{
                echo'<div id="cont-errore"><div id="errore">Richiesta Inviata Correttamente 
                <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"></div></div>';
            }
            }
            
            
            }//SECONDO ELSE
    
    
    
    
    
    
    }//PRIMO ELSE



?>

















