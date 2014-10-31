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
				<title>FaYnt | New Admin</title>
    	</head>
    </html>
    <?php
    //prendo i dati dal from
    $current_camp = $_POST['currCamp'];
    $_SESSION['camp_change_admin'] = $current_camp; //serve per ritornare alla home dell'admin
    $userOldAdmin = $_POST['user'];
    $passOldAdmin = $_POST['pass'];
    $userNewAdmin = $_POST['userNew'];
    //id dell utente corrente
    $id_currentAdmin = $_SESSION['id_utente'];
    //prendo l'userName
    $query = "SELECT utente.user FROM utente WHERE utente.id_utente = '$id_currentAdmin'";
    $ris = mysql_query($query);
    if(!$ris){
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA (1)
               <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
               die;
    }
    $vet = mysql_fetch_array($ris);
    $userCurrentAdmin = $vet['user'];



    //controllo che l'userName e la password corrispondano
    $query = "SELECT user FROM utente WHERE user = '$userOldAdmin' AND password = '$passOldAdmin'";
    $ris = mysql_query($query);
    if(!$ris){
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA (2)
               <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
    }
    @$vet = mysql_fetch_array($ris);
   	@$user = $vet['user'];
   	if(!$user){ //combinazione errata
    	echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> I TUOI DATI INSERITI SONO ERRATI
               <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
               die;
    }
    else{
    	//controllo se l'altro admin esiste
    	
    	$query = "SELECT utente.id_utente FROM utente WHERE utente.user = '$userNewAdmin'";
    	$ris = mysql_query($query);
    }

		if(!$ris){
    		echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA(3)
               		<meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                    die;
    		}
    	@$vet = mysql_fetch_array($ris);
    	if(!$vet['id_utente']){
    		echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> USERNAME DEL NUOVO ADMIN INESISTENTE
               		<meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                    die;
    	}
    	else{
    		//controllo che l'admin non abbia inserito il proprio userName
    		if(strcmp($userCurrentAdmin, $userNewAdmin) == 0){
    			echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SEI GIA ADMIN DI QUESTO CAMPIONATO
               			<meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                        die;
    		}
        }
    		//controllo che l'username inserito appartenga al campionato
    		//prendo l'id del campionato
    		$query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome = '$current_camp' AND campionato.id_admin = '$id_currentAdmin'";
    		$ris = mysql_query($query);
    		if(!$ris){
    			echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SEI GIA ADMIN DI QUESTO CAMPIONATO
               			<meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                        die;
    		}
    		$vet = mysql_fetch_array($ris);
    		$id_camp = $vet['id_campionato'];
            $_SESSION['idcamp_change_admin'] = $id_camp;
    		//c'è da finire il controllo ora non ho voglia
            //richiamo la funzione nel file area_admin function per prendere i partecipanti al campionato
            $user_camp = get_user_champion($id_camp);
            //controllo che l'username inserito sia tra questi
            $check = 0;
            foreach ($user_camp as $value) {
                    if(strcmp($value['user'], $userNewAdmin) == 0){
                        $check = 1;
                        break;
                    }
                    echo ''.$value['user'].' <br>';

                }
            if($check == 0){
                echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> IL NUOVO ADMIN NON PARTECIPA AL CAMPIONATO
                        <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                        die;
            }
    		
    		//prendo l'id del nuovo admin
    		$query = "SELECT utente.id_utente FROM utente WHERE utente.user = '$userNewAdmin'";
    		$ris = mysql_query($query);
    		if(!$ris){
    			echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA (4)
               			<meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                        die;
    		}
    		$vet = mysql_fetch_array($ris);
    		$id_newAdmin = $vet['id_utente'];
    		//va tutto bene mando la notifica
    		//$messaggio = 'L\'amministratore del campionato '.$current_camp.', a cui partecipi, ti ha selezionato come nuovo admin. Clicca nel link sottostante e segui le istruzioni per completare l\'operazione<br><br><a href = "quest_admin.php?camp='.$current_camp.'&&newadmin='.$id_newAdmin.'';
            $messaggio = 'L\'amministratore del campionato '.$current_camp.', a cui partecipi, ti ha selezionato come nuovo admin. Clicca nel link sottostante e segui le istruzioni per completare l\'operazione<br><br>
            <a href = "operazioni_admin/quest_admin.php?camp='.$current_camp.'&&newAd='.$id_newAdmin.'&&oldAd='.$id_currentAdmin.'">Prosegui con il cambio admin</a>';
            $query = "INSERT INTO notifica VALUES(NULL, 'Cambio Admin', '".addslashes($messaggio)."', '0', '$id_currentAdmin', '$id_newAdmin')";
    		$ris = mysql_query($query);
    		if(!$ris){
    			echo '  <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E VERIFICATO UN PROBLEMA(5) 
               			<meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;
                        die;
    		}
    		else{
    			
                    echo '  <div id = "cont-errore"><div id = "errore"> RICHIESTA INVIATA CORRETTAMENTE <br> ATTENDI LA RISPOSTA 
                        <meta http-equiv="Refresh" content="3; URL=home_area_admin.php?camp='.$current_camp.'"> </div></div>' ;   
                        die;  
    		}


    	
    
    	
    ?>
















