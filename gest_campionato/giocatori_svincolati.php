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
<title>FaYnt | Giocatori Svincolati</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<script src="../librerie/jquery-1.11.0.min.js"/></script> 

<script type="text/javascript" src="../script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />
<script>
$(document).ready(function(){
	$("#button").click(function(event) {
			event.stopPropagation();
			
			$("#dropdown").toggle();
		});
	$(document).click( function() {
			$("#dropdown").hide();
		});

	});
</script>

<?php
$id = $_SESSION['id_utente'];
//prendo le notifiche dell'utente
    $num_notifiche = get_notify($id);
//prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
//nome del campionat corrente
$current_camp = $_SESSION['current_camp'];
//campionati a cui è iscritto l'utente
$leagues = get_leagues($id);

$num_camp = count($leagues);

    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
?>

<body class="home-page">
<div id = "cont">
	<div id="top">
    	<div id="top-insize">
        	<div id="top-logo">
        		<a href="index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
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
			//num notifiche nella variabile $num_notifiche
			if($num_notifiche == 0) echo'<div id = "notifiche">
											<a href="../notifiche.php">
												<img id="button" width="26px" height="22px" src = "../img/notifica.png" />
											</a>
										</div>';
			else {
				echo'<div id = "notifiche" class = "arrivata">
				<a href="notifiche.php"><div id="badge">'.$num_notifiche.'</div><img id="button" width="26px" height="22px" src ="../img/notifica-arrivata.png"/></a></div>';}
				?>
				</div>
    </div> <!-- top -->

    <div id = "window"> 

		<div id="menu">
			<div class="menu-principale-container">
				<ul id="menu-principale" class="menu">
					<li id'"item-1" class="style-item-1" >
						<a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
					</li>
					<li id'"item-1" class="style-item-2">
						<a href="../formazione/change_formation.php">Inserisci Formazione</a>
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
						<a href="../documenti.php">Documenti di lega</a>
					</li>
                    <li id'"item-1" class="style-item-8">
                        <a href="../squadre/squadre.php?var=0">Le tue squadre</a>
                    </li>
				</ul>
			</div>
		</div> <!-- menu -->

		<div id = "ul-notizie">
            <div id = "cont-mister">
            </div>
            <div class = "rett">
                <div class = "tria">
                </div>

                <div class = "cont-text">
                    Benvenuto su FaYnt, io sono <b>Gundi!</b> Questa &egrave la home del sito, da qui potrai gestire ogni singola opzione del tuo campionato, crearne di nuovi ed invitare i tuoi amici.
                    Potrai creare nuove squadre a tuo piacimento, scegliere lo stadio, la maglia e dare una descrizione. Nella Home visualizzerai sempre la classifica, la giornata successiva e quella precedente del campionato selezionato. Nel Men&uacute interno gestisci tutto ci&ograve che riguarda la lega selezionata, Nel men&ugrave esterno invece tutte le altre opzioni, come l'inserimento della formazione, accesso alle notifiche e ai documenti della lega, beh....<br> <b> Buon Divertimento!</b>
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

		<div id = "cont-dati">

			<div id = "classifica" class = "cla-svincolati">
				<div id = "cla-title" class = "svincolati">
                <?php echo $current_camp; echo " : " ?>Giocatori Svincolati
            	</div>
            	<div class = "cont-giocatore">

            		<div class = "general">
            			<i>Andrea Consigli</i>
            		</div>
            		<div class = "general ruolo">
            			Portiere
            		</div>
            		<div class = "general information">
            			Clicca per avere maggiori informazioni
            		</div>
            	</div>
            </div><!-- classifica -->
		</div> <!-- cont dati -->

		<div id = "cont-campionati">
			<?php
			echo'<ul class = "camp">';
                        foreach($leagues as $nome){
                            echo '<a href = "../home.php?var=1&&camp='.$nome.'"><li class = "camp">'.$nome.'</li></a>';
                        }
                       echo' </ul>';
                            echo'<div id="tool">
									<div id = "live">Live del campionato</div>
									
                                    <div id = "live" >Regole</div>
                                    <a href = "gest_campionato/giocatori_svincolati.php"><div id = "live" >Giocatori Svincolati</div></a>';
 									//controllo se l'utente  l'amministratore del campionato corrente
 									$query = "SELECT campionato.id_admin FROM campionato WHERE campionato.nome = '$current_camp'";
 									$ris = mysql_query($query);
 									$row = mysql_fetch_array($ris);
 									$id_admin = $row['id_admin'];
 									
 									if($id_admin == $id && $num_camp != 0){ //se  vero l'utente  l'amministratore
 									echo'<a href = "../gest_campionato/gest-campionato.php"><div id = "live" class = "gestione">Gestione Regole</div></a>
                                    <a href = "../operazioni_admin/home_area_admin.php?camp='.$current_camp.'"><div id = "live">Area Admin</div></a>
								</div>';
 								}
              ?>
		</div>

	</div><!-- window -->


























