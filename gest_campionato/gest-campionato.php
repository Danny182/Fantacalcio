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

//prendo le regole del campionato il cui amministratore � l'utente in liea

//prendo l'id del campionato 
$id_camp = get_id($id);
if($id_camp == 0){
		echo ' <div id = "cont-errore"><div id = "errore"> Si � verificato un problema
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
			if($num_notifiche == 0) echo'<div id = "notifiche"><a href="../notifiche.php"> Non hai Notifiche</a> </div>';
				
			else if($num_notifiche == 1) echo'<div id = "notifiche"><a href="../notifiche.php"> Hai '.$num_notifiche.' nuova notifica</a> </div>';
				
			else echo'<div id = "notifiche"><a href="../notifiche.php"> Hai '.$num_notifiche.' nuove notifiche</a> </div>';
				
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
				<a href = "../home.php?var=0"><div id = "live">Indietro</div></a>
			</div>
	</div>
	
	<div id="regole">
		<form action = "salva-regole.php?where=1" method = "post" id = "form" class = "gest_camp">
			<div id = "cont-label-modifica" class = "mod_nome">
				<label for="nome" class = "crea-camp-title">Nome campionato:</label>
					<?php
					echo' <input type = "text" name = "mod_nome" id = "mod_nome" class="modifica-regole-nome"  value =" '.$nome_camp.'" />';
					?>
			</div>
			
			<div id = "cont-label-modifica" class = "mod_n_part">
				<input type="button"  id="info_mod_n_part">
				<label id="info" for="info_mod_n_part" class="info_mod_n_part"><img width="15px" height="15px" src="../img/info.png"></label>
				
			    <label for="nome" class = "crea-camp-title">Numero partecipanti:<br></label>
				<?php
					foreach($regole as $value) $n_part = $value['n_part'];
					echo'<input type = "text" name = "mod_n_part" id = "mod_n_part" class="modifica-regole-n_part" value = '.$n_part.' disabled />';
				?>
				<div id="evento" class="mod_n_part">numero di partecipanti al campionato (te compreso)</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_formazione_automatica">
			<?php foreach($regole as $value) $form_auto = $value['formazione_automatica']?>
				<label for="nome" class = "crea-camp-title"> Inserire formazione automaticamente?</label>				
				<div id="labels">
					<input type="radio" value="si" name="mod_formazione_automatica" id="radio00" checked = "checked" onclick="this.form.mod_penalita.disabled=true;"/>
					<label for="radio00" class = "crea-camp" >Si</label>
					<input type="radio" value="no" name="mod_formazione_automatica" id="radio01" onclick="this.form.mod_penalita.disabled=false;" />
					<label for="radio01" class = "crea-camp">No</label>
				</div>
			</div>
			<div id = "cont-label-modifica" class = "mod_penalita">
			<?php foreach($regole as $value) $penalita = $value['penalita']?>
				<input type="button"  id="info_mod_penalita">
				<label id="info" for="info_mod_penalita" class="info_mod_penalita"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Punti di penalità per<br> mancato inserimento<br></label>
				<input type = "text" name = "mod_penalita" id = "penalita" size = "5" class = "crea-camp-penalita"  value = "<?php echo $penalita;?>" />
				<div id="evento" class="penalita">punti che vengono sottratti in caso non venga consegnata la formazione</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_difesa_gazzetta">
			<?php foreach($regole as $value) $mod_difesa_gazz = $value['mod_difesa_gazzetta']?>
				<input type="button"  id="info_mod_difesa_gazzetta">
				<label id="info" for="info_mod_difesa_gazzetta" class="info_mod_difesa_gazzetta"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore difesa<br> Gazzetta</label>				
				<div id="labels">
				<?php 
					if($mod_difesa_gazz){ //sono valori booleani
						echo'
							<input type="radio" value="si" name="mod_difesa_gazzetta" id="radio1" checked = "checked"/>
							<label for="radio1" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_difesa_gazzetta" id="radio2"/>
							<label for="radio2" class = "crea-camp">No</label>';
						}
					else {
							
						echo'
							<input type="radio" value="si" name="mod_difesa_gazzetta" id="radio1" />
							<label for="radio1" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_difesa_gazzetta" id="radio2" checked = "checked"/>
							<label for="radio2" class = "crea-camp">No</label>';
					}
					?>

				</div>
				<div id="evento" class="mod_difesa_gazzetta">Modificatore della difesa con la regola della Gazzetta</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_portiere">
			<?php foreach($regole as $value) $mod_portiere = $value['mod_portiere']?>
				<input type="button"  id="info_mod_portiere">
				<label id="info" for="info_mod_portiere" class="info_mod_portiere"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore portiere<br><br></label>				
				<div id="labels">
				<?php 
					if($mod_portiere){//sono valori booleani
						echo'
							<input type="radio" value="si" name="mod_portiere" id="radio3" checked = "checked" />
							<label for="radio3" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_portiere" id="radio4"/>
							<label for="radio4" class = "crea-camp">No</label>';
						}
					else{
						echo'<input type="radio" value="si" name="mod_portiere" id="radio3"  />
							<label for="radio3" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_portiere" id="radio4" checked = "checked"/>
							<label for="radio4" class = "crea-camp">No</label>';
						}
				?>
				</div>
				<div id="evento" class="mod_portiere">Modificatore portiere con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_difesa">
			<?php foreach($regole as $value) $mod_difesa = $value['mod_difesa']?>
				<input type="button"  id="info_mod_difesa">
				<label id="info" for="info_mod_difesa" class="info_mod_difesa"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore difesa</label>				
				<div id="labels">
				<?php 
				if($mod_difesa){//sono valori booleani
					echo'
						<input type="radio" value="si" name="mod_difesa" id="radio5" checked = "checked"/>
						<label for="radio5" class = "crea-camp" >Si</label>
						<input type="radio" value="no" name="mod_difesa" id="radio6"/>
						<label for="radio6" class = "crea-camp">No</label>';
					}
				else{
					echo'
						<input type="radio" value="si" name="mod_difesa" id="radio5" />
						<label for="radio5" class = "crea-camp" >Si</label>
						<input type="radio" value="no" name="mod_difesa" id="radio6" checked = "checked"/>
						<label for="radio6" class = "crea-camp">No</label>';
					}
				?>

				</div>
				<div id="evento" class="mod_difesa">Modificatore difesa con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_centrocampo">
			<?php foreach($regole as $value) $mod_centrocampo = $value['mod_centrocampo']?>
				<input type="button"  id="info_mod_centrocampo">
				<label id="info" for="info_mod_centrocampo" class="info_mod_centrocampo"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore centrocampo</label>				
				<div id="labels">
				<?php 
					if($mod_centrocampo){//sono valori booleani
						echo'
							<input type="radio" value="si" name="mod_centrocampo" id="radio7" checked = "checked"/>
							<label for="radio7" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_centrocampo" id="radio8"/>
							<label for="radio8" class = "crea-camp">No</label>';
						}
					else{
						echo'
							<input type="radio" value="si" name="mod_centrocampo" id="radio7" />
							<label for="radio7" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_centrocampo" id="radio8" checked = "checked"/>
							<label for="radio8" class = "crea-camp">No</label>';
						}
						?>
						
				</div>
				<div id="evento" class="mod_centrocampo">Modificatore centrocampo con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_attacco">
			<?php foreach($regole as $value) $mod_attacco = $value['mod_attacco']?>
				<input type="button"  id="info_mod_attacco">
				<label id="info" for="info_mod_attacco" class="info_mod_attacco"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Modificatore attacco</label>				
				<div id="labels">
				<?php 
					if($mod_attacco){//sono valori booleani
						echo'
							<input type="radio" value="si" name="mod_attacco" id="radio9" checked = "checked"/>
							<label for="radio9" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_attacco" id="radio10"/>
							<label for="radio10" class = "crea-camp">No</label>';
						}
					else{
						echo'<input type="radio" value="si" name="mod_attacco" id="radio9" />
							<label for="radio9" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_attacco" id="radio10" checked = "checked"/>
							<label for="radio10" class = "crea-camp">No</label>';
						}
						?>
				</div>
				<div id="evento" class="mod_attacco">Modificatore attacco con le regole ufficiali</div>
			</div>
			
			<div id = "cont-label-modifica"  class = "mod_modulo">
			<?php foreach($regole as $value) $mod_modulo = $value['mod_modulo']?>
				<input type="button"  id="info_mod_modulo">
				<label id="info" for="info_mod_modulo" class="info_mod_modulo"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Possibilità di modifca<br> modulo</label>				
				<div id="labels">
				<?php 
					if($mod_modulo){//sono valori booleani
						echo'
							<input type="radio" value="si" name="mod_modulo" id="radio11" checked = "checked"/>
							<label for="radio11" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_modulo" id="radio12"/>
							<label for="radio12" class = "crea-camp">No</label>';
						}
					else{
						echo'
							<input type="radio" value="si" name="mod_modulo" id="radio11" />
							<label for="radio11" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="mod_modulo" id="radio12"checked = "checked"/>
							<label for="radio12" class = "crea-camp">No</label>';
						}
						?>
				</div>
				<div id="evento" class="mod_modulo">Se abilitato nel caso che non sia disponibile un sostituto dello stesso ruolo entrerà il primo giocatore della lista in panchina</div>
			</div>
			
			<div id = "cont-label-modifica" class = "n_sostituzioni">
			<?php foreach($regole as $value) $n_sostituzioni = $value['n_sostituzioni']?>
				<label for="nome" class = "crea-camp-title">Numero sostituzioni<br> consentite:<br></label>
				<input type = "text" name = "num_sostituzioni" id = "mod_n_part" class="modifica-regole-n_sostituzioni" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $n_sostituzioni; ?>':this.value;"  value = "<?php echo $n_sostituzioni; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_portiere">
			<?php foreach($regole as $value) $bonus_portie = $value['bonus_gol_portiere']?>
				<label for="nome" class = "crea-camp-title">Bonus goal<br> portiere:<br></label>
				<input type = "text" name = "bonus_gol_portiere" id = "mod_n_part" class="modifica-regole-bonus_gol_portiere" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_portie; ?>':this.value;"  value = "<?php echo $bonus_portie; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_difensore">
			<?php foreach($regole as $value) $bonus_difensore = $value['bonus_gol_difensore']?>
				<label for="nome" class = "crea-camp-title">Bonus goal<br> difensore:<br></label>
				<input type = "text" name = "bonus_gol_difensore" id = "mod_n_part" class="modifica-regole-bonus_gol_difensore" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_difensore; ?>':this.value;"  value = "<?php echo $bonus_difensore; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_centrocampista">
			<?php foreach($regole as $value) $bonus_centrocampista = $value['bonus_gol_centrocampista']?>
				<label for="nome" class = "crea-camp-title">Bonus goal<br> centrocampista:<br></label>
				<input type = "text" name = "bonus_gol_centrocampista" id = "mod_n_part" class="modifica-regole-bonus_gol_centrocampista" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_centrocampista; ?>':this.value;"  value = "<?php echo $bonus_centrocampista; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_attaccante">
			<?php foreach($regole as $value) $bonus_attaccante = $value['bonus_gol_attaccante']?>
				<label for="nome" class = "crea-camp-title">Bonus goal<br> attaccante:<br></label>
				<input type = "text" name = "bonus_gol_attaccante" id = "mod_n_part" class="modifica-regole-bonus_gol_attaccante" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_attaccante; ?>':this.value;"  value = "<?php echo $bonus_attaccante; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_rigore">
			<?php foreach($regole as $value) $bonus_rigore = $value['bonus_gol_rigore']?>
				<label for="nome" class = "crea-camp-title">Bonus goal<br> di rigore:<br></label>
				<input type = "text" name = "bonus_gol_rigore" id = "mod_n_part" class="modifica-regole-bonus_gol_rigore" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_rigore; ?>':this.value;"  value = "<?php echo $bonus_rigore; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_rigore_parato">
			<?php foreach($regole as $value) $bonus_rigore_pa = $value['bonus_rigore_parato']?>
				<label for="nome" class = "crea-camp-title">Bonus rigore <br>parato:<br></label>
				<input type = "text" name = "bonus_rigore_parato" id = "mod_n_part" class="modifica-regole-bonus_rigore_parato" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_rigore_pa; ?>':this.value;"  value = "<?php echo $bonus_rigore_pa; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_assist">
			<?php foreach($regole as $value) $bonus_assist = $value['bonus_assist']?>
				<label for="nome" class = "crea-camp-title">Bonus assist:<br><br></label>
				<input type = "text" name = "bonus_assist" id = "mod_n_part" class="modifica-regole-bonus_assist" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_assist; ?>':this.value;"  value = "<?php echo $bonus_assist; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_portiere">
			<?php foreach($regole as $value) $bonus_portiere = $value['bonus_portiere']?>
				<input type="button"  id="info_bonus_portiere">
				<label id="info" for="info_bonus_portiere" class="info_bonus_portiere"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus portiere:<br><br></label>
				<input type = "text" name = "bonus_portiere" id = "mod_n_part" class="modifica-regole-bonus_portiere" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_portiere; ?>':this.value;"  value = "<?php echo $bonus_portiere; ?>"/>
				<div id="evento" class="bonus_portiere">punti che vengono sottratti in caso non venga consegnata la formazione</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_casa">
			<?php foreach($regole as $value) $bonus_casa = $value['bonus_casa']?>
				<input type="button"  id="info_bonus_casa">
				<label id="info" for="info_bonus_casa" class="info_bonus_casa"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus casa:<br><br></label>
				<input type = "text" name = "bonus_casa" id = "mod_n_part" class="modifica-regole-bonus_casa" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_casa; ?>':this.value;"  value = "<?php echo $bonus_casa; ?>"/>
				<div id="evento" class="bonus_casa">punti che vengono sottratti in caso non venga consegnata la formazione</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_vittoria">
			<?php foreach($regole as $value) $bonus_gol_vittoria = $value['bonus_gol_vittoria']?>
				<input type="button"  id="info_bonus_gol_vittoria">
				<label id="info" for="info_bonus_gol_vittoria" class="info_bonus_gol_vittoria"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus goal<br> vittoria:<br></label>
				<input type = "text" name = "bonus_gol_vittoria" id = "mod_n_part" class="modifica-regole-bonus_gol_vittoria" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_gol_vittoria; ?>':this.value;"  value = "<?php echo $bonus_gol_vittoria; ?>"/>
				<div id="evento" class="bonus_gol_vittoria">Bonus che viene dato in caso che il giocatore segni il gol decisivo (es. se Balotelli segna il gol del 2-1 per la vittoria del Milan ed è il risultato finale verrà assegnato tale bonus, se il Milan poi vince 3-1 non verrà assegnato tale Bonus a Balotelli)</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_gol_pareggio">
			<?php foreach($regole as $value) $bonus_gol_pareggio = $value['bonus_gol_pareggio']?>
				<input type="button"  id="info_bonus_gol_pareggio">
				<label id="info" for="info_bonus_gol_pareggio" class="info_bonus_gol_pareggio"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus goal <br>pareggio:<br></label>
				<input type = "text" name = "bonus_gol_pareggio" id = "mod_n_part" class="modifica-regole-bonus_gol_pareggio" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_gol_pareggio; ?>':this.value;"  value = "<?php echo $bonus_gol_pareggio; ?>"/>
				<div id="evento" class="bonus_gol_pareggio">Bonus che viene dato in caso che il giocatore segna il gol del pareggio e questa è l'ultima rete dell'incontro</div>
			</div>
			
			<div id = "cont-label-modifica" class = "bonus_capitano">
			<?php foreach($regole as $value) $bonus_capitano = $value['bonus_capitano']?>
				<input type="button"  id="info_bonus_capitano">
				<label id="info" for="info_bonus_capitano" class="info_bonus_capitano"><img width="15px" height="15px" src="../img/info.png"></label>
				<label for="nome" class = "crea-camp-title">Bonus capitano:<br><br></label>
				<input type = "text" name = "bonus_capitano" id = "mod_n_part" class="modifica-regole-bonus_capitano" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $bonus_capitano; ?>':this.value;"  value = "<?php echo $bonus_capitano; ?>"/>
				<div id="evento" class="bonus_capitano">Bonus che viene dato al capitano se esso prende 7 o più</div>
			</div>
			
			<div id = "cont-label-modifica" class = "malus_gol_subito">
			<?php foreach($regole as $value) $malus_gol_subito = $value['malus_gol_subito']?>
				<label for="nome" class = "crea-camp-title">Malus goal<br> subito:<br></label>
				<input type = "text" name = "malus_gol_subito" id = "mod_n_part" class="modifica-regole-malus_gol_subito" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $malus_gol_subito; ?>':this.value;"  value = "<?php echo $malus_gol_subito; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "ammonizione">
			<?php foreach($regole as $value) $ammonizione = $value['ammonizione']?>
				<label for="nome" class = "crea-camp-title">Ammonizione:<br><br></label>
				<input type = "text" name = "ammonizione" id = "mod_n_part" class="modifica-regole-ammonizione" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $ammonizione; ?>':this.value;"  value = "<?php echo $ammonizione; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "espulsione">
			<?php foreach($regole as $value) $espulsione = $value['espulsione']?>
				<label for="nome" class = "crea-camp-title">Espulsione:<br><br></label>
				<input type = "text" name = "espulsione" id = "mod_n_part" class="modifica-regole-espulsione" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $espulsione; ?>':this.value;"  value = "<?php echo $espulsione; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "malus_rigore_sbagliato">
			<?php foreach($regole as $value) $malus_rigore_sbagliato = $value['malus_rigore_sbagliato']?>
				<label for="nome" class = "crea-camp-title">Malus rigore<br> sbagliato:<br></label>
				<input type = "text" name = "malus_rigore_sbagliato" id = "mod_n_part" class="modifica-regole-malus_rigore_sbagliato" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $malus_rigore_sbagliato; ?>':this.value;"  value = "<?php echo $malus_rigore_sbagliato; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "malus_autogol">
			<?php foreach($regole as $value) $malus_autogol = $value['malus_autogol']?>
				<label for="nome" class = "crea-camp-title">Malus autogol:<br><br></label>
				<input type = "text" name = "malus_autogol" id = "mod_n_part" class="modifica-regole-malus_autogol" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $malus_autogol; ?>':this.value;"  value = "<?php echo $malus_autogol; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "voto_giocatore_sv">
			<?php foreach($regole as $value) $gioc_sv = $value['voto_giocatore_sv']?>
				<label for="nome" class = "crea-camp-title">Voto giocatore SV:<br><br></label>
				<input type = "text" name = "voto_giocatore_sv" id = "mod_n_part" class="modifica-regole-voto_giocatore_sv" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $gioc_sv; ?>':this.value;"  value = "<?php echo $gioc_sv; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "voto_giocatore_ss">
			<?php foreach($regole as $value) $gioc_ss = $value['voto_giocatore_ss']?>
				<label for="nome" class = "crea-camp-title">Voto gioc. <br>se non ha sostituto:<br></label>
				<input type = "text" name = "voto_giocatore_ss" id = "mod_n_part" class="modifica-regole-voto_giocatore_ss" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $gioc_ss; ?>':this.value;"  value = "<?php echo $gioc_ss; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "punti_primo_gol">
			<?php foreach($regole as $value) $primo_gol = $value['punti_primo_gol']?>
				<label for="nome" class = "crea-camp-title">Punti per il primo goal:<br><br></label>
				<input type = "text" name = "punti_primo_gol" id = "mod_n_part" class="modifica-regole-punti_primo_gol" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $primo_gol; ?>':this.value;"  value = "<?php echo $primo_gol; ?>"/>
			</div>
			
			<div id = "cont-label-modifica" class = "punti_range_gol">
			<?php foreach($regole as $value) $range_gol = $value['punti_range_gol']?>
				<label for="nome" class = "crea-camp-title">Punti per i gol successivi:<br><br></label>
				<input type = "text" name = "punti_range_gol" id = "mod_n_part" class="modifica-regole-punti_range_gol" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $range_gol; ?>':this.value;"  value = "<?php echo $range_gol; ?>"/>
			</div>
			
			<div id = "cont-label-modifica"  class = "moduli_validi">
				<label for="nome" class = "crea-camp-title">Moduli consentiti:</label>				
				<div id="labels" class="modulil">
					<?php foreach($regole as $value) $modulo_343 = $value['modulo_343'];?>
						<input type="checkbox" name="modulo_343" id="343" class="modifica-regole-moduli_validi" value="343" <?php if($modulo_343)echo"checked"; ?> >
						<label for="343" class="moduli">3-4-3</label>
						
					<?php foreach($regole as $value) $modulo_352 = $value['modulo_352'];?>
						<input type="checkbox" name="modulo_352" id="352" class="modifica-regole-moduli_validi" value="352" <?php if($modulo_352)echo"checked"; ?>>
						<label for="352" class = "moduli">3-5-2</label>
					
					<?php foreach($regole as $value) $modulo_361 = $value['modulo_361'];?>
						<input type="checkbox" name="modulo_361" id="361" class="modifica-regole-moduli_validi" value="361"  <?php if($modulo_361)echo"checked"; ?> >
						<label for="361" class="moduli">3-6-1</label>
						
					<?php foreach($regole as $value) $modulo_433 = $value['modulo_433'];?>	
					<input type="checkbox" name="modulo_433" id="433" class="modifica-regole-moduli_validi" value="433" <?php if($modulo_433)echo"checked"; ?>>
					<label for="433" class = "moduli">4-3-3</label>
					
					<?php foreach($regole as $value) $modulo_442 = $value['modulo_442'];?>
					<input type="checkbox" name="modulo_442" id="442" class="modifica-regole-moduli_validi" value="442" <?php if($modulo_442)echo"checked"; ?>>
					<label for="442" class="moduli">4-4-2</label>
					
					<?php foreach($regole as $value) $modulo_451 = $value['modulo_451'];?>
					<input type="checkbox" name="modulo_451" id="451" class="modifica-regole-moduli_validi" value="451" <?php if($modulo_451)echo"checked"; ?>>
					<label for="451" class = "moduli">4-5-1</label>
					
					<?php foreach($regole as $value) $modulo_253 = $value['modulo_253'];?>
					<input type="checkbox" name="modulo_253" id="253" class="modifica-regole-moduli_validi" value="253"<?php if($modulo_253)echo"checked"; ?> >
					<label for="253" class="moduli">2-5-3</label>
					
					<?php foreach($regole as $value) $modulo_334 = $value['modulo_334'];?>
					<input type="checkbox" name="modulo_334" id="334" class="modifica-regole-moduli_validi" value="334" <?php if($modulo_334)echo"checked"; ?>>
					<label for="334" class = "moduli">3-3-4</label>
					
					<?php foreach($regole as $value) $modulo_424 = $value['modulo_424'];?>
					<input type="checkbox" name="modulo_424" id="424" class="modifica-regole-moduli_validi" value="424" <?php if($modulo_424)echo"checked"; ?>>
					<label for="424" class="moduli">4-2-4</label>
					
					<?php foreach($regole as $value) $modulo_352 = $value['modulo_352'];?>
					<input type="checkbox" name="modulo_532" id="532" class="modifica-regole-moduli_validi" value="532" <?php if($modulo_352)echo"checked"; ?>>
					<label for="532" class = "moduli">5-3-2</label>
					
					<?php foreach($regole as $value) $modulo_541 = $value['modulo_541'];?>
					<input type="checkbox" name="modulo_541" id="541" class="modifica-regole-moduli_validi" value="541" <?php if($modulo_541)echo"checked"; ?>>
					<label for="541" class="moduli">5-4-1</label>
					
					<?php foreach($regole as $value) $modulo_550 = $value['modulo_550'];?>
					<input type="checkbox" name="modulo_550" id="550" class="modifica-regole-moduli_validi" value="550" <?php if($modulo_550)echo"checked"; ?>>
					<label for="550" class = "moduli">5-5-0</label>
				</div>
			</div>
			
	</div>
	

</body>

</html>






