<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/gest_campionato_function.php");
    include("../funzioni/admin_area_function.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

</head>

<?php


    $nome_camp = $_GET['nomecamp'];
    $team = $_GET['team'];

    $id_user = $_SESSION['id_utente'];

    //prendo l'id del campionato
    $id_camp = get_id_champion($nome_camp);
    
    //controllo che l'admin non stia eliminando la propria squadra
    $query = "SELECT squadra.id_utente FROM squadra WHERE squadra.nome = '$team'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $id_user_team = $row['id_utente'];
    
    if(strcmp($id_user_team, $id_user) == 0){
         echo ' <div id = "cont-errore"><div id = "errore"> Come Amministratore della lega non puoi eliminare la tua squadra Cambia Admin prima
         <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"> </div></div>' ;
        }

    else{
    
    $query = "UPDATE squadra SET squadra.id_campionato = NULL, squadra.iscritta = 0 WHERE squadra.nome = '$team' AND squadra.id_campionato = '$id_camp'";
    $ris = mysql_query($query);
    if($ris){
        echo ' <div id = "cont-errore"><div id = "errore"> Operazione eseguita
        <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"> </div></div>' ;
        }
    else{
        echo ' <div id = "cont-errore"><div id = "errore"> Errore nella richiesta, riprovare più tardi
        <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$nome_camp.'"> </div></div>' ;
    }
    
    }//primo else

?>