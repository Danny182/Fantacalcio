<?php

    function get_user_champion($id_camp){ //funzione che restituisce i nome degli utenti iscritti al campionato e le loro squadre
    $query = "SELECT squadra.id_utente, squadra.nome FROM squadra WHERE squadra.id_campionato = '$id_camp'";
    $ris = mysql_query($query);
    $dates = array();
    while($row = mysql_fetch_array($ris)){
        $id_user = $row['id_utente'];
        $query2 = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente = '$id_user'";
        $ris2 = mysql_query($query2);
        $row2 = mysql_fetch_array($ris2);
        
        $dates [] = array(
                          "nome" => $row2['nome'],
                          "cognome" => $row2['cognome'],
                          "squadra" => $row['nome']
                          );
        }
        return $dates;
    
    }
    
    
    
    
    
    
    
?>