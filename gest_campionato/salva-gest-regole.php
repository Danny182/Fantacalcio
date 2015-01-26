<?php
	include("../session.php");
	include("../connect_db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salvataggio</title>
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<?php 
$check = 0;
//variabile di controllo
//prendo tutti i dati dal form
$id_camp = $_POST['id_camp'];

//controllo la variabile choose: zero => regole generali - uno => regole rosa - due => regole formazioni

if($_GET['choose'] == 0){ //salvo le regole generali
	include("salva-regole-gen.php");
	if($check == 1){
		echo'
			<div id="cont-errore"><div id="errore">OPS! HAI INSERITO QUALCHE VALORE SBAGLIATO
    		<meta http-equiv="Refresh" content="3; URL=gest-campionato.php?choose=1"></div></div>';
		die();
	}

	if($check == 3){
		echo'
			<div id="cont-errore"><div id="errore">ATTENZIONE! <br> NOME DEL CAMPIONATO UTILIZZATO
    		<meta http-equiv="Refresh" content="3; URL=gest-campionato.php?choose=1"></div></div>';
		die();
	}

//salvo i dati
	if($check == 0){
	$query= "UPDATE campionato SET nome='$mod_nome', n_part='$n_part', formazione_automatica='$mod_formazione_automatica', penalita='$mod_penalita', mod_difesa_gazzetta='$mod_difesa_gazzetta', mod_portiere='$mod_portiere', mod_difesa='$mod_difesa', mod_centrocampo='$mod_centrocampo', mod_attacco='$mod_attacco', mod_modulo='$mod_modulo', n_sostituzioni='$num_sostituzioni', bonus_gol_portiere='$bonus_gol_portiere', bonus_gol_difensore='$bonus_gol_difensore', bonus_gol_centrocampista='$bonus_gol_centrocampista', bonus_gol_attaccante='$bonus_gol_attaccante', bonus_gol_rigore='$bonus_gol_rigore', bonus_rigore_parato='$bonus_rigore_parato', bonus_assist='$bonus_assist', bonus_portiere='$bonus_portiere', bonus_casa='$bonus_casa', bonus_gol_vittoria='$bonus_gol_vittoria', bonus_gol_pareggio='$bonus_gol_pareggio', bonus_capitano='$bonus_capitano', malus_gol_subito='$malus_gol_subito', ammonizione='$ammonizione', espulsione='$espulsione', malus_rigore_sbagliato='$malus_rigore_sbagliato', malus_autogol='$malus_autogol', voto_giocatore_sv='$voto_giocatore_sv', voto_giocatore_ss='$voto_giocatore_ss', punti_primo_gol='$punti_primo_gol', punti_range_gol='$punti_range_gol', modulo_343='$modulo_343', modulo_352='$modulo_352', modulo_361='$modulo_361', modulo_433='$modulo_433', modulo_442='$modulo_442', modulo_451='$modulo_451', modulo_253='$modulo_253', modulo_334='$modulo_334', modulo_424='$modulo_424', modulo_532='$modulo_532', modulo_541='$modulo_541', modulo_550='$modulo_550' WHERE id_campionato = '$id_camp'";
	$ris = mysql_query($query);
	if(!$ris){
		echo'
		<div id="cont-errore"><div id="errore">OPS! <br> SI &Eacute; VERIFICATO QUALCHE PROBLEMA
    	<meta http-equiv="Refresh" content="3; URL=gest-campionato.php?choose=0"></div></div>';
	die();
			
	}	
	else{
		echo'
		<div id="cont-errore"><div id="errore"><b>MODIFICHE EFFETTUATE! </b>
    	<meta http-equiv="Refresh" content="3; URL=gest-campionato.php?choose=0"></div></div>';
	}
}

} //IF

if($_GET['choose'] == 1){ //salvo le regole della rosa
		include("salva-regole-rose.php");
		
		if($check == 1){
			echo'
			<div id="cont-errore"><div id="errore"><b>SI E\' VERIFICATO UN ERRORE!</b>
    		<meta http-equiv="Refresh" content="3; URL=gest-campionato.php?choose=2"></div></div>';
    	die();
	}

	$query = "UPDATE campionato SET n_portieri = '$numero_portieri', n_difensori = '$numero_difensori', n_centrocampisti = '$numero_cen', n_attaccanti = '$numero_attaccanti' WHERE id_campionato = '$id_camp'";
	$ris = mysql_query($query);
	if(!$ris){
		echo'
		<div id="cont-errore"><div id="errore">OPS! <br> SI &Eacute; VERIFICATO QUALCHE PROBLEMA
		<meta http-equiv="Refresh" content="3; URL=gest-campionato.php?choose=2"></div></div>';
    die;
			
	}	

	else{
		echo'
		<div id="cont-errore"><div id="errore"><b>MODIFICHE EFFETTUATE!</b>
    	<meta http-equiv="Refresh" content="3; URL=../home.php?var=0"></div></div>';
	}

}
		
?>

<body>
</body>

</html>

























?>