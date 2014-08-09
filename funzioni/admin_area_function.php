<?php

    function get_user_champion($id_camp){ //funzione che restituisce i nome degli utenti iscritti al campionato e le loro squadre
    $query = "SELECT squadra.id_utente, squadra.nome FROM squadra WHERE squadra.id_campionato = '$id_camp'";
    $ris = mysql_query($query);
    $dates = array();
    while($row = mysql_fetch_array($ris)){
        $id_user = $row['id_utente'];
        $query2 = "SELECT utente.nome, utente.cognome, utente.user FROM utente WHERE utente.id_utente = '$id_user'";
        $ris2 = mysql_query($query2);
        $row2 = mysql_fetch_array($ris2);
        
        $dates [] = array(
                          "nome" => $row2['nome'],
                          "cognome" => $row2['cognome'],
                          "squadra" => $row['nome'],
                          "user" => $row2['user']
                          );
        }
        return $dates;
    
    }
    
    function check_email($string){ //funzione che ritorna true se la stringa è una e-mail, false altrimenti
        
        $string = trim($string);
        if(!$string)
            return false;
        
        // controllo che ci sia una sola @
        /*$num_at = count(explode(<a href="mailto:'@'">'@'</a>, $string))-1;
        if($num_at != 1)
            return false;*/
        
        // controllo la presenza di ulteriori caratteri
        if(strpos($string,';') || strpos($string,',') || strpos($string,' '))
            return false;
        
        // la stringa rispetta il formato classico di una mail?
        if(!preg_match( '/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $string))
            return false;
        
        
        //se tutto va bene
        return true;

}
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>