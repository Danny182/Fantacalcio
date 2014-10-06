<?php

    /*function get_userdates($id){
        $query = "SELECT utente.nome, utente.cognome FROM utente WHERE id_utente = '$id'";
        $ris = mysql_query($query);
        $vet = mysql_fetch_array($ris);
        $nome = $vet['nome'];
        $cognome = $vet['cognome'];
        
        $utente = array ('nome'=> "$nome", 'cognome' => "$cognome" );
        
        return $utente;
    }*/
    
          function get_leaguesdates($id_camp){
        
        $query = "SELECT campionato.nome FROM campionato WHERE id_campionato = '$id_camp'";
        $ris = mysql_query($query);
        $vet = mysql_fetch_array($ris);
        
        
        return $vet['nome'];
        
        }

    
    function get_userid($utente){
        $query = "SELECT id_utente FROM utente WHERE utente.user = '$utente'";
        $ris = mysql_query($query);
        if(!$ris) return false;
        else{
        $vet = mysql_fetch_array($ris);
        $id = $vet['id_utente'];
        
        return $id;
        }
        
    }
    
    function count_id($user){
        
        $query = "SELECT count(id_utente) as num FROM utente WHERE utente.user = '$user'";
        $ris = mysql_query($query);
        $vet = mysql_fetch_array($ris);
       return  $vet['num'];
        
        }
    
    function salva_squadra($nome, $admin_squadra, $admin){
        
        //prendo l'id dell'admin
        $query = "SELECT id_utente FROM utente WHERE utente.user = '$admin'";
        $ris = mysql_query($query);
        if(!$ris) return 0;
        $vet = mysql_fetch_array($ris);
        $id_admin = $vet['id_utente'];
        
        //prendo l'id del campionato corrente
        $query = "SELECT id_campionato FROM campionato WHERE campionato.nome = '$nome'";
        $ris = mysql_query($query);
        if(!$ris) return 0;
        $vet = mysql_fetch_array($ris);
        $id_camp = $vet['id_campionato'];
        
        //aggiungo la squadra al campionato
        $query = "UPDATE squadra SET squadra.id_campionato = '$id_camp', squadra.id_utente = '$id_admin', squadra.iscritta = true WHERE squadra.nome = '$admin_squadra' AND squadra.id_utente = '$id_admin'";
        $ris = mysql_query($query);
        if($ris) return 1;
        else return 0;
        
        }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>
