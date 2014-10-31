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
    </html>
    <?php
    $id_newAdmin = $_GET['newAd'];
    $id_oldAdmin = $_GET['oldAd'];
    //cancello la notifica del vecchio admin
    $query = "DELETE FROM notifica WHERE notifica.id_mittente = '$id_newAdmin' AND notifica.id_utente = '$id_oldAdmin' AND notifica.tipo = 'Cambio Admin'";
    $ris = mysql_query($query);
    //prendo l'id del campionato in questione che ho messo in sessione nella pagina check_newadmin
    if(isset($_SESSION['idcamp_change_admin']))
    	$id_camp = $_SESSION['idcamp_change_admin'];
    else{
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA 
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    }

    //effettuo il cambio
    $query = "UPDATE campionato SET campionato.id_admin = '$id_newAdmin' WHERE campionato.id_campionato = '$id_camp'";
    $ris = mysql_query($query);
    if(!$ris){
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA 
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}
    	else{
    		//invio una notifica di conferma al nuovo admin
    		$messaggio = 'L\'operazione di cambio admin è stata eseguita con successo, da ora sei tu il nuovo amministratore!';
    		//id_mittente = 44 è l'utente standard di faynt
    		$query = "INSERT INTO notifica VALUES(NULL, 'Cambio Admin', '".addslashes($messaggio)."', '0', '44', '$id_newAdmin')";
    		$qris = mysql_query($query);
    		echo '<div id = "cont-errore"><div id = "errore"> OPERAZIONE ESEGUITA CON SUCCESSO <br><br> CAMBIO ADMIN ESEGUITO 
               <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    	}

    	?>
   















