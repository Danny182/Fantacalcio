<?php
	include("../session.php");
	include("../connect_db.php");
    //include("../funzioni/notify_function.php");
    include("../funzioni/admin_area_function.php");
    include("../funzioni/function_user.php");
    
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
	
    //prendo i dati della notifica
	$messaggio = $_POST['messaggio'];
    $nome_camp = $_POST['nomecamp'];
    $id = $_SESSION['id_utente']; //id dell'utente in sessione che per accedere qui dovrà essere ladmin del campionato

    //prendo l'id del campionato
    $query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome = '$nome_camp'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $id_camp = $row['id_campionato'];
    $utenti = array();

    $utenti = get_user_champion($id_camp); //dentro array c'è: nome, cognome e user degli utenti iscritti al campionato
    foreach($utenti as $value){
        $user = $value['user'];
        //prendo l'id dell'user corrente
        $id_now = get_userid($user);
        if(strcmp($id_now, $id) != 0){ //questo serve per non madare la notifica anche all'admin
            //creo la notifica
            $query = "INSERT INTO notifica VALUES(NULL, 'Messaggio', '".addslashes($messaggio)."', '0', '$id', '$id_now')";
            $ris = mysql_query($query);
            if($ris){
                echo ' <div id = "cont-errore"><div id = "errore"> Messaggio Inviato
                <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"> </div></div>' ;
            }
            else{
                echo ' <div id = "cont-errore"><div id = "errore"> Si è verificato un problema
                <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"> </div></div>' ;
            }

        }//prima if
    }//foreach


?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
