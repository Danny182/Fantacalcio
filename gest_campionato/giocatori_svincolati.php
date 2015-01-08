<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    include("../funzioni/formazione_functions.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FaYnt | Giocatori Svincolati</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<script src="../librerie/jquery-1.11.0.min.js"/></script> 

<script type="text/javascript" src="../script/menu.js"></script>

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
	//prendo l'id del giocatore selezionato
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
//prendo l'id del campionato
$query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome = '$current_camp'";
$ris = mysql_query($query);
if(!$ris){
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA (1)
        <meta http-equiv="Refresh" content="3; URL=../home.php"> </div></div>' ;
        }
$vet = mysql_fetch_array($ris);
$id_current_camp = $vet['id_campionato'];
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
<div id = "cont" class = "svincolati-noscroll">
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

    <div id = "window" class = "svincolati-page"> 

		<div id="menu">
			<div class="menu-principale-container">
				<ul id="menu-principale" class="menu">
					<li id"item-1" class="style-item-1" >
						<a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
					</li>
					<li id"item-1" class="style-item-2">
						<a href="../formazione/change_formation.php">Inserisci Formazione</a>
					</li>
					<li id"item-1" class="style-item-3">
						<a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
					</li>
					<li id"item-1" class="style-item-4">
						<a href="../crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
					</li>

					<li id"item-1" class="style-item-6">
						<a href="../notifiche.php">Notifiche</a>
					</li>
					<li id"item-1" class="style-item-7">
						<a href="../documenti.php">Documenti di lega</a>
					</li>
                    <li id"item-1" class="style-item-8">
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

                    <div class = "static-title">
            		<!-- testo dinamico inserito da javascript -->
            		</div>
            		<div class = "cont-data">
            			<div class = "gioc-general gioc-ruolo">
            				Ruolo: <i></i>
            			</div>
            			<div class = "gioc-general gioc-nascita">
            				Nato il: <i></i>
            			</div>
            			<div class = "gioc-general gioc-squadra">
            				Squadra: <i></i>
            			</div>
            			<div class = "gioc-general gioc-naz">
            				Nazionalità: <i></i>
            			</div>
            			<div class = "gioc-general gioc-maglia">
            				N° Maglia: <i></i>
            			</div>
            		</div> <!-- cont-data -->
            		<div class = "cont-static">
            			<div class = "gioc-general gioc-pres">
            				Presenze: <i></i>
            			</div>
            			<div class = "gioc-general gioc-gol-fatti">
            				Gol Fatti: <i></i>
            			</div>
            			<div class = "gioc-general gioc-gol-rigore">
            				Gol su Rigore: <i></i>
            			</div>
            			<div class = "gioc-general gioc-assist">
            				Assist: <i></i>
            			</div>
            			<div class = "gioc-general gioc-rig-parato">
            				Rigori Parati: <i></i>
            			</div>
            			<div class = "gioc-general gioc-amm">
            				Ammonizioni: <i></i>
            			</div>
            			<div class = "gioc-general gioc-esp">
            				Espulsioni: <i></i>
            			</div>
            			<div class = "gioc-general gioc-rig-sbagliato">
            				Rigori Sbagliati: <i></i>
            			</div>
            			<div class = "gioc-general gioc-autogol">
            				Autogol: <i></i>
            			</div>
            			<div class = "gioc-general gioc-gol-subiti">
            				Gol Subiti: <i></i>
            			</div>
            		</div> <!--static -->
                </div> <!-- cont-text -->
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

			<?php
			$gioc_svincolati = array();
			//prendo la lista dei giocatori del campionato che non sono stati scelti da nessuna squadra
			//prendo le squadre che giocano nel campionato 
			$query = "SELECT squadra.id_squadra FROM squadra WHERE squadra.id_campionato = '$id_current_camp'";
			$ris = mysql_query($query);
			if(!$ris){
        		echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA (2)
        		<meta http-equiv="Refresh" content="3; URL=../home.php"> </div></div>' ;
        	}
        	while($vet = mysql_fetch_array($ris)){
        		$id_team = $vet['id_squadra'];
        		$vet_giocatori = get_id_giocs();
        		foreach($vet_giocatori as $id_gioc){
        			//inserisco nell'array i giocatori che NON sono associati alla squadra attuale
        			$query = "SELECT id_giocatore FROM appartiene WHERE appartiene.id_squadra = '$id_team' AND appartiene.id_giocatore = '$id_gioc'";
        			$ris = mysql_query($query);
        			$vet = mysql_fetch_array($ris);
        			if(empty($vet['id_giocatore']))
        				//l'insieme restituito è vuoto quindi il giocatore deve essere visualizzato
        				//lo aggiungo all'array
        				$gioc_svincolati[] = $id_gioc;
        			
        		}
        		
        	}

        	
        	
			?>
			<div id = "cla-title" class = "svincolati">
                <?php echo $current_camp; echo " : " ?>Giocatori Svincolati
            </div>
			<div id = "classifica" class = "cla-svincolati">
				<?php
					echo'<div class = "cont-giocatore" id_gioc = "-1">';
            			//nome & cognome
            			echo '<div id = "general">';
            				echo '<i style="color:rgba(1, 159, 199, 0.61);"> Nome & Cognome </i>';
            			echo '</div>';
            			//ruolo
            			echo'<div id = "general" class =  "ruolo">';
            				echo'<i style="color:rgba(1, 159, 199, 0.61);"> Ruolo </i>';
            			echo '</div>';
            			//informazione
            			echo '<div id = "general" class = "information">';
            				echo '<i style="color:rgba(1, 159, 199, 0.61);"> Clicca per avere maggiori informazioni </i>';
            			echo '</div>';

            		echo'</div><!--cont-giocatore-->';

            	$struct_data = array();
            	$struct_statistiche = array();
            	


            	foreach($gioc_svincolati as $id_gioc){
            		$data_gioc = get_data_gioc_by_id($id_gioc);
            		$static_data_gioc = get_static_gioc_by_id($id_gioc);
            		//creo una struttura dati in cui metto tutti i dati dei giocatori che prendo via via
					array_push($struct_data, $data_gioc);
					//qui invece la struct delle statistiche
					//if(!is_empty($static_data_gioc))

					if($static_data_gioc)
					array_push($struct_statistiche, $static_data_gioc);
					//controllo se il nome & cognome è troppo lungo
					$NameSurname = $data_gioc['nome'].$data_gioc['cognome'];
					if(strlen($NameSurname) < 20)
            			echo'<div class = "cont-giocatore" id_gioc = "'.$id_gioc.'">'; 
            		else
            			echo'<div class = "cont-giocatore more" id_gioc = "'.$id_gioc.'">';
            		//l'id serve alla funzione javascript in cima alla pagina
            			//nome & cognome
            		echo '<div div id = "general">';
            				echo ''.$NameSurname.'';
            			echo '</div>';
            			//ruolo
            			if(strlen($NameSurname) < 20){
            			echo'<div div id = "general" class = "ruolo">';
            				echo ''.$data_gioc['ruolo'].'';
            			echo '</div>';
            			}
            			else{
            				echo'<div div id = "general" class = "ruolo ruolo-more">';
            				echo ''.$data_gioc['ruolo'].'';
            				echo '</div>';
            			}
            			
            		echo'</div><!--cont-giocatore-->';
            	}
            	     
            	?>
            	<script type="text/javascript">
            		$(document).ready(function() {

            		// setto i dati iniziali della scheda calciatore
					$('.gioc-general  i').text("--");
            		$('.static-title').text("Seleziona Un giocatore");
            		$(".cont-giocatore").click(function(){
							var cont = $(this);
							var id_gioc = cont.attr("id_gioc"); //prendo l id del giocatore cliccato
							var statics_gioc = <?php echo json_encode($struct_statistiche ); ?>; //prendo le statistiche
							var data_gioc = <?php echo json_encode($struct_data ); ?>; //prendo i dati generali
							var i = 0;
							for(i; i<data_gioc.length; i++){
							if(id_gioc == data_gioc[i]['id_giocatore']){ 
								//prendo i dati generali del giocatore selezionato
								var NameSurname = data_gioc[i]['nome'] + data_gioc[i]['cognome'];
								$('.static-title').text(NameSurname);
								$('.gioc-ruolo i').text(data_gioc[i]['ruolo']);
								$('.gioc-nascita i').text(data_gioc[i]['data_nascita']);
								$('.gioc-squadra i').text(data_gioc[i]['squadra']);
								$('.gioc-naz i').text(data_gioc[i]['nazionalita']);
								$('.gioc-maglia i').text(data_gioc[i]['n_maglia']);
							}//if
						}// 1st for
						
						var found = false;
						for(i = 0; i<statics_gioc.length; i++){
							if(id_gioc == statics_gioc[i]['id_gioc']){ 
								$('.gioc-pres i').text(statics_gioc[i]['presenze']);
								$('.gioc-gol-fatti i').text(statics_gioc[i]['gol_fatti']);
								$('.gioc-gol-rigore i').text(statics_gioc[i]['gol_rigore']);
								$('.gioc-assist i').text(statics_gioc[i]['assist']);
								$('.gioc-rig-parato i').text(statics_gioc[i]['rigore_parati']);
								$('.gioc-amm i').text(statics_gioc[i]['ammonizioni']);
								$('.gioc-esp i').text(statics_gioc[i]['espulsioni']);
								$('.gioc-rig-sbagliato i').text(statics_gioc[i]['rigori_sbagliati']);

								$('.gioc-autogol i').text(statics_gioc[i]['autogol']);
								$('.gioc-gol-subiti i').text(statics_gioc[i]['gol_subiti']);
								found = true;

							}
							if(id_gioc == -1){
								$('.gioc-general  i').text("--");
            					$('.static-title').text("Seleziona Un giocatore");
							}
						} //2nd for
						if(!found){
								$('.gioc-pres i').text("--");
								$('.gioc-gol-fatti i').text("--");
								$('.gioc-gol-rigore i').text("--");
								$('.gioc-assist i').text("--");
								$('.gioc-rig-parato i').text("--");
								$('.gioc-amm i').text("--");
								$('.gioc-esp i').text("--");
								$('.gioc-rig-sbagliato i').text("--");
								$('.gioc-autogol i').text("--");
								$('.gioc-gol-subiti i').text("--");
						}
						}); //click function
					}); //ready
            	</script>

            		
            		<?php
            			/*
            				//prendo i dati del giocatore dalla funzione get_data_gioc_by_id nel fil formazione_functions
            				$data_gioc = get_data_gioc_by_id($id_gioc);
            					//nome e cognome
            					echo'<div class = "cont-giocatore">';
            						echo'<div class = "general">';
            								echo ''.$data_gioc['nome'].' '.$data_gioc['cognome'].'';
            						echo '</div>';
            						//ruolo
            						echo'<div class = "general ruolo">';
            							echo''.$data_gioc['ruolo'].'';
            						echo'</div>';
            						//informazioni
            						echo'<div class = "general information">
            							Clicca per avere maggiori informazioni
            						</div>
            					</div>';
            			}*/
            			
            			?>

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


























