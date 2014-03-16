<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    $user_name = get_user($id);
    foreach($utente as $chiave => $valore){
        $user .= ucfirst("$valore")." ";
    }
    
    //prendo il numero dei partecipanti
    if($_COOKIE['crea_camp']['where']==1) 
    $n_part =$_COOKIE['crea_camp']['mod_n_part'];
    if($_COOKIE['crea_camp']['where']==0) 
    $n_part =$_COOKIE['crea_camp']['n_part'];
	//prendo l'admin del campionato
	$admin =$_COOKIE['crea_camp']['admin'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creazione Campionato..</title>

<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />

<script type="text/javascript" src="../librerie/jquery.min.js"></script> 
<script type="text/javascript" src="../librerie/jquery.validate.js"></script> 
<script type="text/javascript" src="../script/validate_users.js"></script>
</head>

<body>
    <div id = "cont">
        <div id="top">
            <div id="top-insize">
                <div id="top-logo">
                    <a href="../index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
                </div>
<?php
    echo'<div id = "nome">'.$user.'</div>';
    if($num_notifiche == 0) echo'<div id = "notifiche"><a href="notifiche.php"> Non hai Notifiche</a> </div>';
    
    else if($num_notifiche == 1) echo'<div id = "notifiche"><a href="notifiche.php"> Hai '.$num_notifiche.' nuova notifica</a> </div>';
    
    else echo'<div id = "notifiche"><a href="notifiche.php"> Hai '.$num_notifiche.' nuove notifiche</a> </div>';
    ?>
</div>
</div>

<div id = "windows">
    <div id="menu">
        <div class="menu-principale-container">
            <ul id="menu-principale" class="menu">
                <li id'"item-1" class="style-item-1">
                    <a href="../home.php">Home</a>
                </li>
                <li id'"item-1" class="style-item-2">
                    <a href="inserisci_formazione.php">Inserisci la formazione</a>
                </li>
                <li id'"item-1" class="style-item-3">
                    <a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
                </li>
                <li id'"item-1" class="style-item-4">
                        <a href="crea_squadra.php">Crea una nuova Squadra</a>
                </li>

                <li id'"item-1" class="style-item-6">
                    <a href="messaggi.php">Messaggi</a>
                </li>
                <li id'"item-1" class="style-item-7">
                    <a href="documenti.php">Documenti di lega</a>
                </li>
            </ul>
    </div>
</div>



<form action = "invita-utenti.php" method = "POST" id="invita">


	<div id = "cont-nomi">
		<div id="spiegazione">
			Di seguito dovrai inserire l' username dei partecipanti o la loro email per invitarli ad iscriversi al campionato
	</div>
		<ul id = "utenti">
			
			<?php
			echo'<li class = "utenti">
					<label for="nome" class = "crea-camp-title"> Utente 1 </label>
					<input type = "text" name = "utente1" id = "utente1" size = "16" class = "utenti" value='.$admin.' disabled = "true"  />
				</li>';	
				$i = 2;
				while($i <= ($n_part)){
					
					echo'
						<li class = "utenti">
							 <label for="nome" class = "crea-camp-title"> Utente '.($i).' </label>
								<input type = "text" name = "utente'.$i.'" id = "utente'.$i.'" size = "16" class = "utenti"  />
						</li>';
								$i++;
					
					}
				
			?>
		</ul>

		<input type = "submit"<input type = "submit" value = "Invita" class = "reg-utenti" />
	</div>
</form>






</div><!--windows -->

</div><!--cont -->


</body>

</html>































