  <?php
    	include("../session.php");
    	include("../connect_db.php");
        include("../funzioni/home_function.php");
        include("../funzioni/admin_area_function.php");
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    	<head>
    		<link rel="shortcut icon" href="../favicon.ico" />
    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="../stili/style-leggir.css" type="text/css" media="screen" /> 
			<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />   			
				<title>FaYnt | New Admin</title>
    	</head>

    <?php
    $id_oldAdmin = $_POST['oldAd'];
    $id_newAdmin = $_POST['newAd'];
    //cancello la notifica per evitare un riutilizzo
    $query = "DELETE FROM notifica WHERE notifica.id_mittente = '$id_oldAdmin' AND notifica.id_utente = '$id_newAdmin' AND notifica.tipo = 'Cambio Admin'";
    $ris = mysql_query($query);
    if(!$ris){
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA 
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}

    //vedo se la richiesta è stata accettata
    if(isset($_POST['accetta'])){
    	//richiesta accettata
    	//invio una notifica al vecchio admin che deve concludere l'operazione

    	$messaggio = 'La richiesta di cambio admin è stata accettata. Clicca nel link sottostante per completare l\' operazione <br><br>
    	<a href = "operazioni_admin/set_newadmin.php?newAd='.$id_newAdmin.'&&oldAd='.$id_oldAdmin.'">Completa l\'operazione</a>';
    	$query = "INSERT INTO notifica VALUES(NULL, 'Cambio Admin', '".addslashes($messaggio)."', '0', '$id_newAdmin', '$id_oldAdmin')";
    	$ris = mysql_query($query);
    	if(!$ris){
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA 
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}
    	else{
    		echo ' <div id = "cont-errore"><div id = "errore"> NOTIFICA INVIATA <br> ATTENDI LA FINE DELL\' OPERAZIONE
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}


    }
    else{
    	$messaggio = 'La richiesta di cambio admin è stata rifiutata. L\'operazione è stata annullata';
    	$query = "INSERT INTO notifica VALUES(NULL, 'Cambio Admin', '".addslashes($messaggio)."', '0', '$id_newAdmin', '$id_oldAdmin')";
    	$ris = mysql_query($query);
    	if(!$ris){
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA 
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}
    	else{
    		echo ' <div id = "cont-errore"><div id = "errore"> NOTIFICA INVIATA <br> ATTENDI LA FINE DELL\' OPERAZIONE
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}
    }
    	
    
