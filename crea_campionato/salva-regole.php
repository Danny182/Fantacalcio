<?php
    include("../session.php");
    include("../connect_db.php");
    
    	//se si viene dalla pagina modifica-regole.php
	if($_GET['where']==1){
		$v['mod_nome'] = $_POST['mod_nome'];
		$v['mod_n_part'] = $_POST['mod_n_part'];
		$v['mod_formazione_automatica'] = $_POST['mod_formazione_automatica'];
		$v['mod_penalita'] = $_POST['mod_penalita'];
		$v['mod_difesa_gazzetta'] = $_POST['mod_difesa_gazzetta'];
		$v['mod_portiere'] = $_POST['mod_portiere'];
		$v['mod_difesa'] = $_POST['mod_difesa'];
		$v['mod_centrocampo'] = $_POST['mod_centrocampo'];
		$v['mod_attacco'] = $_POST['mod_attacco'];
		$v['mod_modulo'] = $_POST['mod_modulo'];
		$v['num_sostituzioni'] = $_POST['num_sostituzioni'];
		$v['bonus_gol_portiere'] = $_POST['bonus_gol_portiere'];
		$v['bonus_gol_difensore'] = $_POST['bonus_gol_difensore'];
		$v['bonus_gol_centrocampista'] = $_POST['bonus_gol_centrocampista'];
		$v['bonus_gol_attaccante'] = $_POST['bonus_gol_attaccante'];
		$v['bonus_gol_rigore'] = $_POST['bonus_gol_rigore'];
		$v['bonus_rigore_parato'] = $_POST['bonus_rigore_parato'];
		$v['bonus_assist'] = $_POST['bonus_assist'];
		$v['bonus_portiere'] = $_POST['bonus_portiere'];
		$v['bonus_casa'] = $_POST['bonus_casa'];
		$v['bonus_gol_vittoria'] = $_POST['bonus_gol_vittoria'];
		$v['bonus_gol_pareggio'] = $_POST['bonus_gol_pareggio'];
		$v['bonus_capitano'] = $_POST['bonus_capitano'];
		$v['malus_gol_subito'] = $_POST['malus_gol_subito'];
		$v['ammonizione'] = $_POST['ammonizione'];
		$v['espulsione'] = $_POST['espulsione'];
		$v['malus_rigore_sbagliato'] = $_POST['malus_rigore_sbagliato'];
		$v['malus_autogol'] = $_POST['malus_autogol'];
		$v['voto_giocatore_sv'] = $_POST['voto_giocatore_sv'];
		$v['voto_giocatore_ss'] = $_POST['voto_giocatore_ss'];
		$v['punti_primo_gol'] = $_POST['punti_primo_gol'];
		$v['punti_range_gol'] = $_POST['punti_range_gol'];
		$v['modulo_343'] = $_POST['modulo_343'];
		$v['modulo_352'] = $_POST['modulo_352'];
		$v['modulo_361'] = $_POST['modulo_361'];
		$v['modulo_433'] = $_POST['modulo_433'];
		$v['modulo_442'] = $_POST['modulo_442'];
		$v['modulo_451'] = $_POST['modulo_451'];
		$v['modulo_253'] = $_POST['modulo_253'];
		$v['modulo_334'] = $_POST['modulo_334'];
		$v['modulo_424'] = $_POST['modulo_424'];
		$v['modulo_532'] = $_POST['modulo_532'];
		$v['modulo_541'] = $_POST['modulo_541'];
		$v['modulo_550'] = $_POST['modulo_550'];
		$v['where']=$_GET['where'];		
		
		foreach ($v as $key => $value)
			setcookie("crea_camp[$key]", $value, 0);
	}
	if($_GET['where']==0)
	{	$v['where']=$_GET['where'];
		$v['formazione_automatica']=$_GET['formazione_automatica'];
		$v['penalita']=$_GET['penalita'];
		foreach ($v as $key => $value)
			setcookie("crea_camp[$key]", $value, 0);
	}
			
				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<title>Crea Il Campionato</title>
</head>
<body>

	<div id="cont-errore"><div id="errore">Regole salvate<br>Vai al passaggio finale!
    <meta http-equiv="Refresh" content="3; URL=insert-utenti.php"></div></div>

</body>
</html>
