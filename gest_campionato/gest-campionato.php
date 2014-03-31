<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestione Campionato</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/gest_campionato.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<script src="../librerie/jquery-1.11.0.min.js"/></script> 
<!--
 <script src="librerie/jquery-1.9.1.min.js"/></script> 
<script src="librerie/jquery-ui-1.10.3.custom.min.js."></script>
<script type="text/javascript" src="librerie/jquery.easing.1.3.js"></script> 
<script type = "text/javascript" src = "librerie/jquery.innerfade.js"> </script>-->


<script type="text/javascript" src="../script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />

</head>

<?php

$id = $_SESSION['id_utente'];

//prendo alcuni dati dell'utente(in questo caso nome e cognome)
$utente = get_userdates($id);
$user = array();
$user = " ";
foreach($utente as $chiave => $value ){
	$user .= ucfirst("$value")." ";
}
//prendo le notifiche dell'utente
$num_notifiche = get_notify($id);

?>

<body class="home-page">
	<div id = "cont">
	<div id="top">
    	<div id="top-insize">
        	<div id="top-logo">
        		<a href="../index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
        	</div>
        	<?php
			echo'<div id = "nome"><div id="nome-inside">'.$user.'</div><img id="button" src="../img/tool3.png" width="22px" height="22px">
			<br><div id="dropdown">
			<ul id="menu_utente">				
				<a class="user_color" href="../user/modifica.php">
					<li id="menu_utente">
						modifica utente
					</li>
				</a>
				<a class="user_color" href="../user/log-out.php">
					<li id="menu_utente">
						log out
					</li>
				</a>			
			</ul>
		</div>
			</div>';
			if($num_notifiche == 0) echo'<div id = "notifiche"><a href="../notifiche.php"> Non hai Notifiche</a> </div>';
				
			else if($num_notifiche == 1) echo'<div id = "notifiche"><a href="../notifiche.php"> Hai '.$num_notifiche.' nuova notifica</a> </div>';
				
			else echo'<div id = "notifiche"><a href="../notifiche.php"> Hai '.$num_notifiche.' nuove notifiche</a> </div>';
				
			?>
			    </div>
    </div> 
    
    <div id = "window"> 

		<div id="menu">
			<div class="menu-principale-container">
				<ul id="menu-principale" class="menu">
					<li id'"item-1" class="style-item-1" >
						<a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
					</li>
					<li id'"item-1" class="style-item-2">
						<a href="inserisci_formazione.php">Inserisci la formazione</a>
					</li>
					<li id'"item-1" class="style-item-3">
						<a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
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
		<div id = "ul-notizie">
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
			</div>
		</div><!-- ul-notizie -->
		
			<div id = "cont-dati" class = "gest-regole">
			<ul class = "gest-regole">
				<li class = "gest-regole"> </li>
				<li class = "gest-regole"> </li>
				<li class = "gest-regole"> </li>
				
			</ul>
			
			</div>
		
		
		
		
		
		
		
</div>
</div>


</body>

</html>






