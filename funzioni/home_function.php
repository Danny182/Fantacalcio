<?php

    
    function get_notify($id){
        
        //seleziono il numero di notifiche non lette dell'utente in sessione
        $query = "SELECT count(id_notifica) as notifiche FROM notifica, utente WHERE utente.id_utente=notifica.id_utente AND notifica.id_utente='$id' AND letta = 'false'";
        $ris = mysql_query($query);
        $vet_not = mysql_fetch_array($ris);
        
        return $vet_not['notifiche'];
        
        }

    function get_leagues($id){
        
        $query = "SELECT campionato.nome FROM squadra, utente, campionato WHERE utente.id_utente = squadra.id_utente AND squadra.id_campionato = campionato.id_campionato AND utente.id_utente = '$id'";
        $ris = mysql_query($query);
        $campionati = array();
        $i = 0;
        while($row = mysql_fetch_array($ris)){
            $campionati[$i] = $row['nome'];
            $i++;
        }
        
        return $campionati;
            
        }

    function get_userdates($id){
        
        $query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente='$id'";
        $ris = mysql_query($query);
        $vet = mysql_fetch_array($ris);
       
        
        $utente = array('nome' => $vet['nome'],
                        'cognome' => $vet['cognome']
                        );
        
        return $utente;
        
        }

    function create_class($id_camp){
        
        $query = "SELECT squadra.nome, punti FROM squadra WHERE squadra.id_campionato = '$id_camp'";
        $ris = mysql_query($query);
        
        $classifica = array();
        while($row = mysql_fetch_array($ris)){
            
            $classifica[] = array(
                        "nome" => $row['nome'],
                        "punti" => $row['punti']
                                  );
            
            
        }
        var_dump($classifica);
        
        //c'è da ordinare il vettore
        
        return $classifica;
        
        }
    
    
    function get_teams($id){
        $query = "SELECT squadra.nome, squadra.nome_stadio FROM squadra WHERE  squadra.id_utente = '$id' AND squadra.iscritta = false";
        $ris = mysql_query($query);
        $teams = array();
        
        while($row = mysql_fetch_array($ris)){
            $teams[] = array(
                             "nome" => $row['nome'],
                             "stadio" => $row['nome_stadio']
                        );
            
            }
        return $teams;
        }
        
    
    function get_user($id){
        
        $query = "SELECT utente.user FROM utente WHERE utente.id_utente = '$id'";
        @$ris = mysql_query($query);
        @$vet = mysql_fetch_array($ris);
        return $vet['user'];
        
        }
    
        
    function get_teamsdates($nome_squadra, $id){
        
        $query = "SELECT squadra.stadio FROM squadra WHERE squadra.nome = '$nome_squadra' AND squadra.id_utente = '$id'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        
        return $row['stadio'];
        
        
        
        
    }
        
    
    function iscrivi_squadra($nome_squadra, $id_camp, $id){
        
        $query = "UPDATE squadra SET squadra.id_campionato = '$id_camp', squadra.iscritta = 1 WHERE squadra.nome = '$nome_squadra'";
        $ris = mysql_query($query);
        if($ris) return 1;
        else return 0;
        
        }
    
    
    function get_idadmin($id_camp){
        
        $query = "SELECT admin FROM campionato WHERE id_campionato = '$id_camp'";
        @$ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        $admin = $row['admin'];
        
        //id dell'admin
        $query = "SELECT utente.id_utente FROM utente WHERE user = '$admin'";
        @$ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        
        return $row['id_utente'];
        
        
        
    }
    
    function get_url($prova){
        
        $stringa = explode("/", $prova);
        $var = '../';
        $url = $var;
        $url .= $stringa[4].'/'.$stringa[5].'/'.$stringa[6];
        return $url;
        
        
    
    }























