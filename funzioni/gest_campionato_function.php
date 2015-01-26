<?php 

function get_id($id){
	
	$query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.id_admin = '$id'";
	$ris = mysql_query($query);
	if(!$ris) return 0;
	else{
	$row = mysql_fetch_array($ris);
	return $row['id_campionato'];
	}
}

function get_rules($id_camp){
	
	$query = "SELECT formazione_automatica, penalita, mod_difesa_gazzetta, mod_portiere, mod_difesa, mod_centrocampo, mod_attacco, mod_modulo, n_sostituzioni, bonus_gol_portiere, bonus_gol_difensore, bonus_gol_centrocampista, bonus_gol_attaccante, 
			  bonus_gol_rigore, bonus_rigore_parato, bonus_assist, bonus_portiere, bonus_casa, bonus_gol_vittoria, bonus_gol_pareggio, bonus_capitano, malus_gol_subito, ammonizione, 
			  espulsione, malus_rigore_sbagliato, malus_autogol,
			  voto_giocatore_sv, voto_giocatore_ss, punti_primo_gol, punti_range_gol, modulo_343, modulo_352, modulo_361, modulo_433, modulo_442, modulo_451, modulo_253,
			  modulo_334, modulo_424, modulo_532, modulo_541, modulo_550, n_portieri, n_difensori, n_centrocampisti, n_attaccanti, campionato.nome, n_part, crediti FROM campionato WHERE campionato.id_campionato = '$id_camp'";
	$ris = mysql_query($query);
	if(!$ris) return 0;
	else{
		$row = mysql_fetch_array($ris);
		//salvo tutto in un array
		$regole[] = array(
		
				"formazione_automatica" => $row['formazione_automatica'],
				"penalita" => $row['penalita'],
				"mod_difesa_gazzetta" => $row['mod_difesa_gazzetta'],
				"mod_portiere" => $row['mod_portiere'],
				"mod_difesa" => $row['mod_difesa'],
				"mod_centrocampo" => $row['mod_centrocampo'],
				"mod_attacco" => $row['mod_attacco'],
				"mod_modulo" => $row['mod_modulo'],
				"n_sostituzioni" => $row['n_sostituzioni'],
				"bonus_gol_portiere" => $row['bonus_gol_portiere'],
				"bonus_gol_difensore" => $row['bonus_gol_difensore'],
				"bonus_gol_centrocampista" => $row['bonus_gol_centrocampista'],
				"bonus_gol_attaccante" => $row['bonus_gol_attaccante'],
				"bonus_gol_rigore" => $row['bonus_gol_rigore'],
				"bonus_rigore_parato" => $row['bonus_rigore_parato'],
				"bonus_assist" => $row['bonus_assist'],
				"bonus_portiere" => $row['bonus_portiere'],
				"bonus_casa" => $row['bonus_casa'],
				"bonus_gol_vittoria" => $row['bonus_gol_vittoria'],
				"bonus_gol_pareggio" => $row['bonus_gol_pareggio'],
				"bonus_capitano" => $row['bonus_capitano'],
				"malus_gol_subito" => $row['malus_gol_subito'],
				"ammonizione" => $row['ammonizione'],
				"espulsione" => $row['espulsione'],
				"malus_rigore_sbagliato" => $row['malus_rigore_sbagliato'],
				"malus_autogol" => $row['malus_autogol'],
				"voto_giocatore_sv" => $row['voto_giocatore_sv'],
				"voto_giocatore_ss" => $row['voto_giocatore_ss'],
				"punti_primo_gol" => $row['punti_primo_gol'],
				"punti_range_gol" => $row['punti_range_gol'],
				"modulo_343" => $row['modulo_343'],
				"modulo_352" => $row['modulo_352'],
				"modulo_361" => $row['modulo_361'],
				"modulo_433" => $row['modulo_433'],
				"modulo_442" => $row['modulo_442'],
				"modulo_451" => $row['modulo_451'],
				"modulo_253" => $row['modulo_253'],
				"modulo_334" => $row['modulo_334'],
				"modulo_424" => $row['modulo_424'],
				"modulo_532" => $row['modulo_532'],
				"modulo_541" => $row['modulo_541'],
				"modulo_550" => $row['modulo_550'],
				"partecipanti" => $row['partecipanti'],
				"nome" => $row['nome'],
				"n_part" => $row['n_part'],
				"n_portieri" => $row['n_portieri'],
				"n_difensori" => $row['n_difensori'],
				"n_centrocampisti" => $row['n_centrocampisti'], 
				"n_attaccanti" => $row['n_attaccanti'],
				"crediti" => $row['crediti']
			);
			
		return $regole;
	
	
	}
	
}

    function get_admin($id_camp){
        
        $query = "SELECT campionato.admin FROM campionato WHERE campionato.id_campionato = '$id_camp'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        return $row['admin'];
        
        
    }


    function get_id_champion($name){
        $query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome = '$name'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        return $row['id_campionato'];
        
    }








?>