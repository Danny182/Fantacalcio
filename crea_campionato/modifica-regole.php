<?php
    include("../session.php");
    include("../connect_db.php");
    include("../funzioni/home_function.php");
    
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
  /*  //prendo l id del campionato
    $query = "SELECT id_campionato FROM campionato WHERE campionato.nome = '$nome_camp'";
    $ris = mysql_query($query);
    $vet = mysql_fetch_array($ris);
    $id_camp = $vet['id_campionato'];*/
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
    
	$n_part =$_COOKIE['crea_camp']['n_part'];
	$nome_camp = $_GET['nome'];  
	$formazione = $_GET['formazione'];
	$penalita = $_GET['penalita'];
	
		
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creazione Campionato</title>

<script src="../librerie/jquery-1.11.0.min.js"/></script>
<script type="text/javascript" src="../script/crea-camp.js"/></script>

<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />


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
				//num notifiche nella variabile $num_notifiche
                if($num_notifiche == 0) echo'<div id = "notifiche">
                <a href="notifiche.php">
                <img id="button" width="26px" height="22px" src = "../img/notifica.png" />
                </a>
                </div>';
                
                else echo'<div id = "notifiche" class = "arrivata"><a href="notifiche.php"><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png" /> </a> </div>';
				
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
	<div id="regole">
		<div id="spiegazione" class="mod_regole">
			Di seguito ci sono tutti i form dove potrai modificare le regole a tuo piacimento!
		</div>
		<form action = "salva-regole.php?where=1" method = "post" id = "form">
			<div id = "cont-label-modifica" class = "mod_nome">
				<label for="nome" class = "crea-camp-title">Nome campionato:</label>
				<?php
					echo'<input type = "text" name = "mod_nome" id = "mod_nome" class="modifica-regole-nome" onclick="this.value=\'\';" onfocus="this.select()" onblur="this.value=!this.value?'.$nome_camp.':this.value;" value = '.$nome_camp.' />';
				?>
			</div>
			
			<div id = "cont-label-modifica" class = "mod_n_part">
				<input type="button"  id="info_mod_n_part">
				<label id="info" for="info_mod_n_part" class="info_mod_n_part"><img width="15px" height="15px" src="../img/info.png"></label>
				
				<label for="nome" class = "crea-camp-title">Numero partecipanti:</label>
				<?php
					echo'<input type = "text" name = "mod_n_part" id = "mod_n_part" class="modifica-regole-n_part" onclick="this.value=\'\';" onfocus="this.select()" onblur="this.value=!this.value?'.$n_part.':this.value;" value = '.$n_part.' />';
				?>
				<div id="evento" class="mod_n_part">numero di partecipanti al campionato (te compreso)</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_formazione_automatica">
				<label for="nome" class = "crea-camp-title"> Inserire formazione automaticamente?</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_formazione_automatica" id="radio00" checked = "checked" onclick="this.form.mod_penalita.disabled=true;"/>
					<label for="radio00" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_formazione_automatica" id="radio01" onclick="this.form.mod_penalita.disabled=false;" />
					<label for="radio01" class = "crea-camp">No</label>
				</div>
			</div>

			<div id = "cont-label-modifica" class = "mod_penalita">
				<input type="button"  id="info_mod_penalita">
				<label id="info" for="info_mod_penalita" class="info_mod_penalita"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Punti di penalità in caso di mancato inserimento</label>
				<input type = "text" name = "mod_penalita" id = "penalita" size = "5" class = "crea-camp-penalita" disabled = "true" value = "0" />
				<div id="evento" class="penalita">punti che vengono sottratti in caso non venga consegnata la formazione</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_difesa_gazzetta">
				<input type="button"  id="info_mod_difesa_gazzetta">
				<label id="info" for="info_mod_difesa_gazzetta" class="info_mod_difesa_gazzetta"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore difesa Gazzetta</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_difesa_gazzetta" id="radio1" checked = "checked"/>
					<label for="radio1" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_difesa_gazzetta" id="radio2"/>
					<label for="radio2" class = "crea-camp">No</label>
				</div>
				<div id="evento" class="mod_difesa_gazzetta">Modificatore della difesa con la regola della Gazzetta</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_portiere">
				<input type="button"  id="info_mod_portiere">
				<label id="info" for="info_mod_portiere" class="info_mod_portiere"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore portiere</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_portiere" id="radio3" checked = "checked" />
					<label for="radio3" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_portiere" id="radio4"/>
					<label for="radio4" class = "crea-camp">No</label>
				</div>
				<div id="evento" class="mod_portiere">Modificatore portiere con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_difesa">
				<input type="button"  id="info_mod_difesa">
				<label id="info" for="info_mod_difesa" class="info_mod_difesa"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore difesa</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_difesa" id="radio5" checked = "checked"/>
					<label for="radio5" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_difesa" id="radio6"/>
					<label for="radio6" class = "crea-camp">No</label>
				</div>
				<div id="evento" class="mod_difesa">Modificatore difesa con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_centrocampo">
				<input type="button"  id="info_mod_centrocampo">
				<label id="info" for="info_mod_centrocampo" class="info_mod_centrocampo"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore centrocampo</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_centrocampo" id="radio7" checked = "checked"/>
					<label for="radio7" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_centrocampo" id="radio8"/>
					<label for="radio8" class = "crea-camp">No</label>
				</div>
				<div id="evento" class="mod_centrocampo">Modificatore centrocampo con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_attacco">
				<input type="button"  id="info_mod_attacco">
				<label id="info" for="info_mod_attacco" class="info_mod_attacco"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore attacco</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_attacco" id="radio9" checked = "checked"/>
					<label for="radio9" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_attacco" id="radio10"/>
					<label for="radio10" class = "crea-camp">No</label>
				</div>
				<div id="evento" class="mod_attacco">Modificatore attacco con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_modulo">
				<input type="button"  id="info_mod_modulo">
				<label id="info" for="info_mod_modulo" class="info_mod_modulo"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Possibilità di modifca modulo</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_modulo" id="radio11" checked = "checked"/>
					<label for="radio11" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_modulo" id="radio12"/>
					<label for="radio12" class = "crea-camp">No</label>
				</div>
				<div id="evento" class="mod_modulo">Se abilitato nel caso che non sia disponibile un sostituto dello stesso ruolo entrerà il primo giocatore della lista in panchina</div>
			</div>
			
			<div id = "cont-label-modifica" class = "n_sostituzioni">
				<label for="nome" class = "crea-camp-title">Numero sostituzioni consentite:</label>
				<input type = "text" name = "num_sostituzioni" id = "mod_n_part" class="modifica-regole-n_sostituzioni" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_portiere">
				<label for="nome" class = "crea-camp-title">Bonus goal portiere:</label>
				<input type = "text" name = "bonus_gol_portiere" id = "mod_n_part" class="modifica-regole-bonus_gol_portiere" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_difensore">
				<label for="nome" class = "crea-camp-title">Bonus goal difensore:</label>
				<input type = "text" name = "bonus_gol_difensore" id = "mod_n_part" class="modifica-regole-bonus_gol_difensore" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_centrocampista">
				<label for="nome" class = "crea-camp-title">Bonus goal centrocampista:</label>
				<input type = "text" name = "bonus_gol_centrocampista" id = "mod_n_part" class="modifica-regole-bonus_gol_centrocampista" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_attaccante">
				<label for="nome" class = "crea-camp-title">Bonus goal attaccante:</label>
				<input type = "text" name = "bonus_gol_attaccante" id = "mod_n_part" class="modifica-regole-bonus_gol_attaccante" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_rigore">
				<label for="nome" class = "crea-camp-title">Bonus goal di rigore:</label>
				<input type = "text" name = "bonus_gol_rigore" id = "mod_n_part" class="modifica-regole-bonus_gol_rigore" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_rigore_parato">
				<label for="nome" class = "crea-camp-title">Bonus rigore parato:</label>
				<input type = "text" name = "bonus_rigore_parato" id = "mod_n_part" class="modifica-regole-bonus_rigore_parato" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_assist">
				<label for="nome" class = "crea-camp-title">Bonus assist:</label>
				<input type = "text" name = "bonus_assist" id = "mod_n_part" class="modifica-regole-bonus_assist" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'1':this.value;"  value = "1"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_portiere">
				<input type="button"  id="info_bonus_portiere">
				<label id="info" for="info_bonus_portiere" class="info_bonus_portiere"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus portiere:</label>
				<input type = "text" name = "bonus_portiere" id = "mod_n_part" class="modifica-regole-bonus_portiere" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0':this.value;"  value = "0"/>
				<div id="evento" class="bonus_portiere">punti che vengono sottratti in caso non venga consegnata la formazione</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_casa">
				<input type="button"  id="info_bonus_casa">
				<label id="info" for="info_bonus_casa" class="info_bonus_casa"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus casa:</label>
				<input type = "text" name = "bonus_casa" id = "mod_n_part" class="modifica-regole-bonus_casa" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'2':this.value;"  value = "2"/>
				<div id="evento" class="bonus_casa">punti che vengono sottratti in caso non venga consegnata la formazione</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_vittoria">
				<input type="button"  id="info_bonus_gol_vittoria">
				<label id="info" for="info_bonus_gol_vittoria" class="info_bonus_gol_vittoria"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus goal vittoria:</label>
				<input type = "text" name = "bonus_gol_vittoria" id = "mod_n_part" class="modifica-regole-bonus_gol_vittoria" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0':this.value;"  value = "0"/>
				<div id="evento" class="bonus_gol_vittoria">Bonus che viene dato in caso che il giocatore segni il gol decisivo (es. se Balotelli segna il gol del 2-1 per la vittoria del Milan de è il risultato finale verrà assegnato tale bonus, se il Milan poi vince 3-1 non verrà assegnato tale Bonus a Balotelli)</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_pareggio">
				<input type="button"  id="info_bonus_gol_pareggio">
				<label id="info" for="info_bonus_gol_pareggio" class="info_bonus_gol_pareggio"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus goal pareggio:</label>
				<input type = "text" name = "bonus_gol_pareggio" id = "mod_n_part" class="modifica-regole-bonus_gol_pareggio" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0':this.value;"  value = "0"/>
				<div id="evento" class="bonus_gol_pareggio">Bonus che viene dato in caso che il giocatore segna il gol del pareggio e questa è l'ultima rete dell'incontro</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_capitano">
				<input type="button"  id="info_bonus_capitano">
				<label id="info" for="info_bonus_capitano" class="info_bonus_capitano"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus capitano:</label>
				<input type = "text" name = "bonus_capitano" id = "mod_n_part" class="modifica-regole-bonus_capitano" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0':this.value;"  value = "0"/>
				<div id="evento" class="bonus_capitano">Bonus che viene dato al capitano se esso prende 7 o più</div>
			</div>
			
			<div id = "cont-label-modifica" class = "malus_gol_subito">
				<label for="nome" class = "crea-camp-title">Malus goal subito:</label>
				<input type = "text" name = "malus_gol_subito" id = "mod_n_part" class="modifica-regole-malus_gol_subito" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'1':this.value;"  value = "1"/>
			</div>
			
			<div id = "cont-label-modifica" class = "ammonizione">
				<label for="nome" class = "crea-camp-title">Ammonizione:</label>
				<input type = "text" name = "ammonizione" id = "mod_n_part" class="modifica-regole-ammonizione" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0.5':this.value;"  value = "0.5"/>
			</div>
			
			<div id = "cont-label-modifica" class = "espulsione">
				<label for="nome" class = "crea-camp-title">Espulsione:</label>
				<input type = "text" name = "espulsione" id = "mod_n_part" class="modifica-regole-espulsione" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'1':this.value;"  value = "1"/>
			</div>
			
			<div id = "cont-label-modifica" class = "malus_rigore_sbagliato">
				<label for="nome" class = "crea-camp-title">Malus rigore sbagliato:</label>
				<input type = "text" name = "malus_rigore_sbagliato" id = "mod_n_part" class="modifica-regole-malus_rigore_sbagliato" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "malus_autogol">
				<label for="nome" class = "crea-camp-title">Malus autogol:</label>
				<input type = "text" name = "malus_autogol" id = "mod_n_part" class="modifica-regole-malus_autogol" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			
			<div id = "cont-label-modifica" class = "voto_giocatore_sv">
				<label for="nome" class = "crea-camp-title">Voto giocatore se è senza voto:</label>
				<input type = "text" name = "voto_giocatore_sv" id = "mod_n_part" class="modifica-regole-voto_giocatore_sv" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0':this.value;"  value = "0"/>
			</div>
			
			<div id = "cont-label-modifica" class = "voto_giocatore_ss">
				<label for="nome" class = "crea-camp-title">Voto gioc. se non ha sostituto:</label>
				<input type = "text" name = "voto_giocatore_ss" id = "mod_n_part" class="modifica-regole-voto_giocatore_ss" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'0':this.value;"  value = "0"/>
			</div>
			
			<div id = "cont-label-modifica" class = "punti_primo_gol">
				<label for="nome" class = "crea-camp-title">Punti per il primo goal:</label>
				<input type = "text" name = "punti_primo_gol" id = "mod_n_part" class="modifica-regole-punti_primo_gol" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'66':this.value;"  value = "66"/>
			</div>
			
			<div id = "cont-label-modifica" class = "punti_range_gol">
				<label for="nome" class = "crea-camp-title">Punti per i gol successivi:</label>
				<input type = "text" name = "punti_range_gol" id = "mod_n_part" class="modifica-regole-punti_range_gol" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'6':this.value;"  value = "6"/>
			</div>
			<div id = "cont-label-modifica" class = "n_portieri">
				<label for="nome" class = "crea-camp-title">Numero massimo di portieri:</label>
				<input type = "text" name = "n_portieri" id = "mod_n_part" class="modifica-regole-n_portieri" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'3':this.value;"  value = "3"/>
			</div>
			<div id = "cont-label-modifica" class = "n_difensori">
				<label for="nome" class = "crea-camp-title">Numero massimo di difensori:</label>
				<input type = "text" name = "n_difensori" id = "mod_n_part" class="modifica-regole-n_difensori" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'8':this.value;"  value = "8"/>
			</div>
			<div id = "cont-label-modifica" class = "n_centrocampisti">
				<label for="nome" class = "crea-camp-title n_centrocampisti">Numero massimo di centrocampisti:</label>
				<input type = "text" name = "n_centrocampisti" id = "mod_n_part" class="modifica-regole-n_centrocampisti" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'9':this.value;"  value = "9"/>
			</div>
			<div id = "cont-label-modifica" class = "n_attaccanti">
				<label for="nome" class = "crea-camp-title">Numero massimo di attaccanti:</label>
				<input type = "text" name = "n_attaccanti" id = "mod_n_part" class="modifica-regole-n_attaccanti" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'6':this.value;"  value = "6"/>
			</div>
			<br>
			<div id = "cont-label-modifica"  class = "moduli_validi">
				<label for="nome" class = "crea-camp-title">Moduli consentiti:</label>				
				<div id="labels" class="modulil">
					<input type="checkbox" name="modulo_343" id="343" class="modifica-regole-moduli_validi" value="343" checked>
					<label for="343" class="moduli">3-4-3</label>
					<input type="checkbox" name="modulo_352" id="352" class="modifica-regole-moduli_validi" value="352" checked>
					<label for="352" class = "moduli">3-5-2</label>
					<input type="checkbox" name="modulo_361" id="361" class="modifica-regole-moduli_validi" value="361" >
					<label for="361" class="moduli">3-6-1</label>
					<input type="checkbox" name="modulo_433" id="433" class="modifica-regole-moduli_validi" value="433" checked>
					<label for="433" class = "moduli">4-3-3</label>
					<input type="checkbox" name="modulo_442" id="442" class="modifica-regole-moduli_validi" value="442" checked>
					<label for="442" class="moduli">4-4-2</label>
					<input type="checkbox" name="modulo_451" id="451" class="modifica-regole-moduli_validi" value="451" checked>
					<label for="451" class = "moduli">4-5-1</label>
					<input type="checkbox" name="modulo_253" id="253" class="modifica-regole-moduli_validi" value="253" >
					<label for="253" class="moduli">2-5-3</label>
					<input type="checkbox" name="modulo_334" id="334" class="modifica-regole-moduli_validi" value="334">
					<label for="334" class = "moduli">3-3-4</label>
					<input type="checkbox" name="modulo_424" id="424" class="modifica-regole-moduli_validi" value="424">
					<label for="424" class="moduli">4-2-4</label>
					<input type="checkbox" name="modulo_532" id="532" class="modifica-regole-moduli_validi" value="532" checked>
					<label for="532" class = "moduli">5-3-2</label>
					<input type="checkbox" name="modulo_541" id="541" class="modifica-regole-moduli_validi" value="541" checked>
					<label for="541" class="moduli">5-4-1</label>
					<input type="checkbox" name="modulo_550" id="550" class="modifica-regole-moduli_validi" value="550">
					<label for="550" class = "moduli">5-5-0</label>
				</div>
			</div>
			<input type = "submit" value = "Salva le regole" class = "mod-regole" />
		</form>
		
	</div>	
			
	</div>
</div><!--cont-->

</body>
</html>
