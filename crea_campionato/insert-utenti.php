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

<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />

<script type="text/javascript" src="../librerie/jquery.min.js"></script> 
<script type="text/javascript" src="../librerie/jquery.validate.js"></script> 
<script type="text/javascript" src="../script/validate_users.js"></script>
</head>

<body class="crea-camp-page">
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
						<a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
					</li>
					<li id'"item-1" class="style-item-2">
						<a href="inserisci_formazione.php">Inserisci la formazione</a>
					</li>
					<li id'"item-1" class="style-item-3">
						<a href="#">Crea un Campionato</a>
					</li>
					<li id'"item-1" class="style-item-4">
						<a href="../crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
					</li>

					<li id'"item-1" class="style-item-6">
						<a href="../notifiche.php">Notifiche</a>
					</li>
					<li id'"item-1" class="style-item-7">
						<a href="documenti.php">Documenti di lega</a>
					</li>
                    <li id'"item-1" class="style-item-8">
                        <a href="../squadre/squadre.php?var=0">Le tue squadre</a>
                    </li>
				</ul>
			</div>
		</div>

<div id = "ul-notizie" class = "camp">
<div id="campo">	<!--decorazioni -->

    <div id = "porta1">
    </div>
    <div id="traversa">
    </div>
    <div id="traversa2">
    </div>
    <div id="mezzos">
    </div>
    <div id="mezzod">
    </div>
    <div id="dischettos">
    </div>
    <div id="dischettod">
    </div>
    <div id="areas">
    </div>
    <div id="areas2">
    </div>
    <div id = "linea">
    </div>
    <div id="centroc">
    </div>
    <div id="centro">
    </div>
    <div id = "porta2">
    </div>
    <div id = "ca">
    </div>
    <div id = "ca" class = "right1">
    </div>
    <div id = "ca" class = "left">
    </div>
    <div id = "ca" class = "right2">
    </div>

</div><!--campo-->
</div><!-- ul-notizie -->



<form action = "invita-utenti.php" method = "POST" id="invita">


	<div id = "cont-nomi">
		
		<ul id = "utenti">
			
			<?php
			echo'<li class = "utenti">
					<label for="nome" class = "crea-camp-title"> Admin </label>
					<input type = "text" name = "utente1" id = "utente1" size = "16" class = "utenti" value='.$admin.' disabled = "true"  />
				</li>';	
				$i = 2;
				while($i <= ($n_part)){
					
					echo'
						<li class = "utenti">
							 <label for="nome" class = "crea-camp-title"> Giocatore n. '.($i).' </label>
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































