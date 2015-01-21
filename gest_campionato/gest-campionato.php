<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    include("../funzioni/gest_campionato_function.php");
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
<script type="text/javascript" src="../librerie/jquery-1.9.1.min.js"/></script>
<script type="text/javascript" src="../script/crea-camp.js"/></script>
<!--
 <script src="librerie/jquery-1.9.1.min.js"/></script> 
<script src="librerie/jquery-ui-1.10.3.custom.min.js."></script>
<script type="text/javascript" src="librerie/jquery.easing.1.3.js"></script> 
<script type = "text/javascript" src = "librerie/jquery.innerfade.js"> </script>-->


<script type="text/javascript" src="../script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />

<script type="text/javascript">
function submitform()
{
  document.getElementById('gest').submit();
}
</script>

</head>

<?php

$id = $_SESSION['id_utente'];
$choose = $_GET['choose']; //scelta di quale men˘ Ë stato cliccato. choose = 1 => regole generali, choose = 2 => gestione rose 
// choose = 3 => gestione formazioni
//prendo alcuni dati dell'utente(in questo caso nome e cognome)
$utente = get_userdates($id);
$user = array();
$user = " ";
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
//prendo le notifiche dell'utente
$num_notifiche = get_notify($id);

//prendo le regole del campionato il cui amministratore è l'utente in liea

//prendo l'id del campionato 
$id_camp = get_id($id);
if($id_camp == 0){
		echo ' <div id = "cont-errore"><div id = "errore"> Si è verificato un problema
        <meta http-equiv="Refresh" content="3; URL=../home.php"> </div></div>' ;
}
$query = "SELECT campionato.nome FROM campionato WHERE campionato.id_campionato = '$id_camp'";
$ris = mysql_query($query);
$row = mysql_fetch_array($ris);
$nome_camp = $row['nome'];


$regole = array();
$regole = get_rules($id_camp);


?>

<body class="home-page">
	<div id = "cont" >
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
			if($num_notifiche == 0) echo'<div id = "notifiche">
											<a href="../notifiche.php">
												<img id="button" width="26px" height="22px" src = "../img/notifica.png" />
											</a>
										</div>';
			
			else {echo'<div id = "notifiche" class = "arrivata">
						<a href="../notifiche.php"><div id="badge">'.$num_notifiche.'</div><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png"/></a></div>';}
			
			
			
			?>
			    </div>
    </div> 
    
    <div id = "windows"> 

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
			<div id = "cont-mister">
            </div>
            <div class = "rett">
                <div class = "tria">
                </div>

                <div class = "cont-text">
                    Ciao <?php echo ucfirst($nome); ?>! Da qui potrai gestire tutte le <b>regole del campionato</b> di cui sei admin. Abbiamo suddiviso le areee per 
                    facilitarti la leggibilit&aacute. <br> 
                    Hai una vasta quantit&aacute di scelta ma puoi sempre appellarti alle <b>regole standard del fantacalcio</b>. <br>Se vuoi saperne di pi&uacute
                    visita l'apposita sezione <b>nel men&uacute documenti</b>.
                    Stai molto attento alle opzioni che scegli e soprattutto <b>parlane con i tuoi amici</b>, ne va del diverimento!
                </div>
            </div>
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
	<div id = "cont-campionati">
			<div id="tool">
			
				<a href = "../home.php?var=0"><div id = "live" class = "back">Indietro</div></a>

				<a href = "gest-campionato.php?choose=1"><div id = "live" class = "general">Regole Generali</div></a>
				<a href = "gest-campionato.php?choose=2"><div id = "live" class = "rose">Gestione Rose</div></a>
				<a href = "gest-campionato.php?choose=3"><div id = "live" class = "formazioni">Gestione Formazioni</div></a>
				
				
				<!-- <a href = "javascript: submitform()"><div id = "live">Salva le Modifiche</div></a> -->
			</div>
				
	</div>
	<?php
	if($choose == 1){
	?>
	<div id="regole">
		
		<?php include("gest-general-rules.php"); //file nella stessa cartella ?>

	</div>
	<?php
	}
	?>

	<?php
		if($choose == 2){
			include("gest-rosa.php");
		}
		?>

	
	

</body>

</html>






