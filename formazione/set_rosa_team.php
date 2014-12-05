<?php

//portieri
        echo'
        <ul id="accordion">
            <li id="title">Portieri
                <ul>';
                    
                        /*
                            La prima volta scorro la query, solo che successivamente non me la fa scorrere di nuovo
                            Non posso fare il ciclo while($vet = mysql_fet...) più volte nello stesso script quindi
                            nel primo ciclo mi salvo in un array gli id che prendo dal fetch della query.
                            Nei cicli successi (Dif, Cen, Att) uso quell'array (array_id_gioc).
                        */
                    
                    while($vet = mysql_fetch_array($ris)){
                        //scorro via via gli id dei giocatori
                        //prendo tutti i dati
                        $array_id_gioc [] = array(
                                        "id" => $vet['id_giocatore']
                                        ); 
                        $gioc_data = get_data_gioc_by_id($vet['id_giocatore']);

                        if(strcmp($gioc_data['ruolo'], "P") == 0){
                            echo '<li> '.$gioc_data['nome'].' '.$gioc_data['cognome'].'</li>';
                        }
                    }
                    echo '</ul></li>';
                    
                        
    //fine dei portieri
                    
    //difensori
        echo'
            <li> Difensori
                <ul>';
                    foreach($array_id_gioc as $value){
                        //scorro via via gli id dei giocatori
                        //prendo tutti i dati
                        $gioc_data = get_data_gioc_by_id($value['id']);
                        if(strcmp($gioc_data['ruolo'], "D") == 0){
                            echo '<li> '.$gioc_data['nome'].' '.$gioc_data['cognome'].'</li>';
                        }
                    }
                    echo '</ul></li>';
    
    //fine dei difensori
    //centrocampisti
        echo'
            <li> Centrocampisti
                <ul>';
                    foreach($array_id_gioc as $value){
                        //scorro via via gli id dei giocatori
                        //prendo tutti i dati
                        $gioc_data = get_data_gioc_by_id($value['id']);
                        if(strcmp($gioc_data['ruolo'], "C") == 0){
                            echo '<li> '.$gioc_data['nome'].' '.$gioc_data['cognome'].'</li>';
                        }
                    }
                    echo '</ul></li>';
                    
    //fine dei centrocampisti
    //attaccanti
                    echo'
            <li> Attaccanti
                <ul>';
                    foreach($array_id_gioc as $value){
                        //scorro via via gli id dei giocatori
                        //prendo tutti i dati
                        $gioc_data = get_data_gioc_by_id($value['id']);
                        if(strcmp($gioc_data['ruolo'], "A") == 0){
                            echo '<li> '.$gioc_data['nome'].' '.$gioc_data['cognome'].'</li>';
                        }
                    }
                    echo '</ul></li>';
    //fine degli attaccanti
    
?>