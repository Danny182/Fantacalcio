<?php

function get_team_id_by_team_user($id_user, $id_camp){
	$query = "SELECT squadra.id_squadra FROM squadra WHERE squadra.id_utente = '$id_user' AND squadra.id_campionato = '$id_camp'";
	$ris = mysql_query($query);
	$vet = mysql_fetch_array($ris);
	return $vet['id_squadra'];
}

function get_data_gioc_by_id($id_gioc){
	$query = "SELECT giocatore.nome, giocatore.cognome, giocatore.ruolo, giocatore.n_maglia FROM giocatore WHERE giocatore.id_giocatore = '$id_gioc'";
	$ris = mysql_query($query);
	$vet = mysql_fetch_array($ris);
	return $vet;	
}




?>