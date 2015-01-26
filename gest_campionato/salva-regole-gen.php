<?php

$mod_nome = trim($_POST['mod_nome']);
if(is_numeric($mod_nome)) $check=1;

//controllo che il nome del campionato modificato non esista già
$controllo = 0;
$query = "SELECT campionato.nome FROM campionato";
$ris = mysql_query($query);
while($row = mysql_fetch_array($ris)){
	if(strcmp(strtolower($row['nome']), strtolower($mod_nome)) == 0){ //nome già esistente
		$controllo = 1;
		break;
	}
}
//controllo che il nome del campionato sia sempre lo stesso
$query = "SELECT campionato.nome FROM campionato WHERE campionato.id_campionato = '$id_camp'";
$ris = mysql_query($query);
$row = mysql_fetch_array($ris);
if(strcmp($row['nome'], $mod_nome) == 0)
	$controllo = 0;

if($controllo)
	$check = 3; //check = 3 => Campionato già esistente

//fine controllo

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
$n_part = $_POST['mod_n_part'];
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

?>