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

//regole
$mod_nome = trim($_POST['mod_nome']);
if(is_numeric($mod_nome)) $check=1;

$mod_formazione_automatica = $_POST['mod_formazione_automatica'];
$mod_penalita = $_POST['mod_penalita'];
if(!is_numeric($mod_penalita)) $check=1;

$mod_difesa_gazzetta = $_POST['mod_difesa_gazzetta'];
$mod_portiere = $_POST['mod_portiere'];
$mod_difesa = $_POST['mod_difesa'];
$mod_centrocampo = $_POST['mod_centrocampo'];
$mod_attacco = $_POST['mod_attacco'];
$mod_modulo = $_POST['mod_modulo'];
$num_sostituzioni = $_POST['num_sostituzioni'];
if(!is_numeric($num_sostituzioni)) $check=1;

$bonus_gol_portiere = $_POST['bonus_gol_portiere'];
if(!is_numeric($bonus_gol_portiere)) $check=1;

$bonus_gol_difensore = $_POST['bonus_gol_difensore'];
if(!is_numeric($bonus_gol_difensore)) $check=1;

$bonus_gol_centrocampista = $_POST['bonus_gol_centrocampista'];
if(!is_numeric($bonus_gol_centrocampista)) $check=1;

$bonus_gol_attaccante = $_POST['bonus_gol_attaccante'];
if(!is_numeric($bonus_gol_attaccante)) $check=1;

$bonus_gol_rigore = $_POST['bonus_gol_rigore'];
if(!is_numeric($bonus_gol_rigore)) $check=1;

$bonus_rigore_parato = $_POST['bonus_rigore_parato'];
if(!is_numeric($bonus_rigore_parato)) $check=1;

$bonus_assist = $_POST['bonus_assist'];
if(!is_numeric($bonus_assist)) $check=1;

$bonus_portiere = $_POST['bonus_portiere'];
if(!is_numeric($bonus_portiere)) $check=1;

$bonus_gol_vittoria = $_POST['bonus_gol_vittoria'];
if(!is_numeric($bonus_gol_vittoria)) $check=1;

$bonus_gol_pareggio = $_POST['bonus_gol_pareggio'];
if(!is_numeric($bonus_gol_pareggio)) $check=1;

$bonus_capitano = $_POST['bonus_capitano'];
if(!is_numeric($bonus_capitano)) $check=1;
$malus_gol_subito = $_POST['malus_gol_subito'];
if(!is_numeric($malus_gol_subito)) $check=1;

$bonus_casa = $_POST['bonus_casa'];
if(!is_numeric($bonus_casa)) $check=1;

$ammonizione = $_POST['ammonizione'];
if(!is_numeric($ammonizione)) $check=1;

$espulsione = $_POST['espulsione'];
if(!is_numeric($espulsione)) $check=1;

$malus_rigore_sbagliato = $_POST['malus_rigore_sbagliato'];
if(!is_numeric($malus_rigore_sbagliato)) $check=1;

$malus_autogol = $_POST['malus_autogol'];
if(!is_numeric($malus_autogol)) $check=1;

$voto_giocatore_sv = $_POST['voto_giocatore_sv'];
if(!is_numeric($voto_giocatore_sv)) $check=1;

$voto_giocatore_ss = $_POST['voto_giocatore_ss'];
if(!is_numeric($voto_giocatore_ss)) $check=1;

$punti_primo_gol = $_POST['punti_primo_gol'];
if(!is_numeric($punti_primo_gol)) $check=1;

$punti_range_gol = $_POST['punti_range_gol'];
if(!is_numeric($punti_range_gol)) $check=1;

if(isset($_POST['modulo_343'])) $modulo_343=1;
else $modulo_343=0;
if(isset($_POST['modulo_352'])) $modulo_352=1;
else $modulo_352=0;
if(isset($_POST['modulo_361'])) $modulo_361=1;
else $modulo_361=0;
if(isset($_POST['modulo_433'])) $modulo_433=1;
else $modulo_433=0;
if(isset($_POST['modulo_442'])) $modulo_442=1;
else $modulo_442=0;
if(isset($_POST['modulo_451'])) $modulo_451=1;
else $modulo_451=0;
if(isset($_POST['modulo_253'])) $modulo_253=1;
else $modulo_253=0;
if(isset($_POST['modulo_334'])) $modulo_334=1;
else $modulo_334=0;
if(isset($_POST['modulo_424'])) $modulo_424=1;
else $modulo_424=0;
if(isset($_POST['modulo_532'])) $modulo_532=1;
else $modulo_532=0;
if(isset($_POST['modulo_541'])) $modulo_541=1;
else $modulo_541=0;
if(isset($_POST['modulo_550'])) $modulo_550=1;
else $modulo_550=0;


if($check == 1){
	echo'
		<div id="cont-errore"><div id="errore">Ops! Hai qualche valore errato..
    	<meta http-equiv="Refresh" content="3; URL=gest-campionato.php"></div></div>';
	die;
	}

//salvo i dati
	$query= "UPDATE campionato SET nome='$mod_nome', n_part='$mod_n_part', formazione_automatica='$mod_formazione_automatica', penalita='$mod_penalita', mod_difesa_gazzetta='$mod_difesa_gazzetta', mod_portiere='$mod_portiere', mod_difesa='$mod_difesa', mod_centrocampo='$mod_centrocampo', mod_attacco='$mod_attacco', mod_modulo='$mod_modulo', n_sostituzioni='$num_sostituzioni', bonus_gol_portiere='$bonus_gol_portiere', bonus_gol_difensore='$bonus_gol_difensore', bonus_gol_centrocampista='$bonus_gol_centrocampista', bonus_gol_attaccante='$bonus_gol_attaccante', bonus_gol_rigore='$bonus_gol_rigore', bonus_rigore_parato='$bonus_rigore_parato', bonus_assist='$bonus_assist', bonus_portiere='$bonus_portiere', bonus_casa='$bonus_casa', bonus_gol_vittoria='$bonus_gol_vittoria', bonus_gol_pareggio='$bonus_gol_pareggio', bonus_capitano='$bonus_capitano', malus_gol_subito='$malus_gol_subito', ammonizione='$ammonizione', espulsione='$espulsione', malus_rigore_sbagliato='$malus_rigore_sbagliato', malus_autogol='$malus_autogol', voto_giocatore_sv='$voto_giocatore_sv', voto_giocatore_ss='$voto_giocatore_ss', punti_primo_gol='$punti_primo_gol', punti_range_gol='$punti_range_gol', modulo_343='$modulo_343', modulo_352='$modulo_352', modulo_361='$modulo_361', modulo_433='$modulo_433', modulo_442='$modulo_442', modulo_451='$modulo_451', modulo_253='$modulo_253', modulo_334='$modulo_334', modulo_424='$modulo_424', modulo_532='$modulo_532', modulo_541='$modulo_541', modulo_550='$modulo_550' WHERE id_campionato = '$id_camp'";
	$ris = mysql_query($query);
	if(!$ris){
		echo'
		<div id="cont-errore"><div id="errore">OPS! <br> Si &eacute; verificato qualche problema..';
    	
	die;
			//<meta http-equiv="Refresh" content="3; URL=gest-campionato.php"></div></div>';
	}	
	else{
		echo'
		<div id="cont-errore"><div id="errore">Modifiche Effettuate!
    	<meta http-equiv="Refresh" content="3; URL=../home.php?var=0"></div></div>';
	}
		

?>
<body>
</body>

</html>

























?>