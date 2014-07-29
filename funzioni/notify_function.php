<?php
function get_userdates($id){
    
    $query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente='$id'";
    $ris = mysql_query($query);
    $vet = mysql_fetch_array($ris);
    $nome = $vet['nome'];
    $cognome = $vet['cognome'];
    
    $utente = array('nome' => "$nome",'cognome' => "$cognome");
    
    return $utente;
    
}

    function get_notify($id){
        
        $query = "SELECT notifica.testo, notifica.tipo, notifica.id_mittente, notifica.id_notifica FROM notifica, utente WHERE notifica.id_utente = utente.id_utente and notifica.id_utente = '$id' ORDER BY notifica.id_notifica DESC";
        $ris = mysql_query($query);
        $notifica = array();
        while($row = mysql_fetch_array($ris)){
            $notifica[] = array (
                                 "testo" => $row['testo'],
                                 "tipo" => $row['tipo'],
                                 "mitt" => $row['id_mittente'],
            					 "id_notifica" => $row['id_notifica']
                                 );
            }
        
        return $notifica;
        
    }


?>
