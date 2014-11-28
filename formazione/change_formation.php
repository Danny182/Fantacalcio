    <?php
    	include("../session.php");
    	include("../connect_db.php");
        include("../funzioni/home_function.php");
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <link rel="shortcut icon" href="../favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FaYnt | Formazione</title>
    <link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../stili/style-formazione.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
    <script src="../librerie/jquery-1.11.0.min.js"/></script>
    

    <script type="text/javascript" src="../script/menu.js"></script>
    <script type="text/javascript" src="../script/menu-formazione.js"></script>
    <link rel="stylesheet" type="text/css" href="../stili/menu2.css" />
    <script>
    $(document).ready(function(){
                      $("#button").click(function(event) {
                                         event.stopPropagation();
                                         
                                         $("#dropdown").toggle();
                                         });
                      $(document).click( function() {
                                        $("#dropdown").hide();
                                        });
                      
                      });
    </script>

    <?php
        $id = $_SESSION['id_utente'];
        $num_notifiche = $_SESSION['notifiche'];
        
        //prendo alcuni dati dell'utente(in questo caso nome e cognome)
        $utente = get_userdates($id);
        
        foreach($utente as $value){
            $nome = $value['nome'];
            $cognome = $value['cognome'];
            $user .= ucfirst("$nome")." ".ucfirst("$cognome");
            
        }
        
    ?>


    <body class="home-page">
        <div id = "cont">
            <div id="top">
                <div id="top-insize">
                    <div id="top-logo">
                        <a href="../index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
                </div>
    <?php
        echo'<div id = "nome"><div id="nome-inside">'.$user.'</div><img id="button" src="../img/tool3.png" width="22px" height="22px">
            <br><div id="dropdown">
                    <ul id="menu_utente">
                        <a class="user_color" href="../user/modifica.php">
                            <li id="menu_utente">
                                modifica utente
                            </li>
                        </a>
                        <a class="user_color" href="../user/log-out.php">
                            <li id="menu_utente">
                                log out
                            </li>
                        </a>
                    </ul>
                </div>
            </div>';
        //num notifiche nella variabile $num_notifiche
        if($num_notifiche == 0) echo'<div id = "notifiche">
            <a href="../notifiche.php">
                <img id="button" width="26px" height="22px" src = "../img/notifica.png" />
            </a>
        </div>';
        
        else {echo'<div id = "notifiche" class = "arrivata">
            <a href="notifiche.php"><div id="badge">'.$num_notifiche.'</div><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png"/></a></div>';}
            
            
            
            ?>


        </div>
    </div>

    <div id = "window" class = "formazione">

        <div id="menu">
            <div class="menu-principale-container">
                <ul id="menu-principale" class="menu">
                    <li id'"item-1" class="style-item-1" >
                        <a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
                    </li>
                    <li id'"item-1" class="style-item-2">
                        <a href="#">Inserisci Formazione</a>
                    </li>
                    <li id'"item-1" class="style-item-3">
                        <a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
                    </li>
                    <li id'"item-1" class="style-item-4">
                        <a href="../crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
                    </li>

                    <li id'"item-1" class="style-item-6">
                        <a href="../notifiche.php">Notifiche</a>
                    </li>
                    <li id'"item-1" class="style-item-7">
                        <a href="documenti.php">Documenti di lega</a>
                    </li>
                    <li id'"item-1" class="style-item-8">
                        <a href="../squadre/squadre.php?var=0">Le tue squadre</a>
                    </li>
                </ul>
            </div>
    </div><!-- menu -->
    <ul id="accordion">
    <li class = "portieri">Portieri
        <ul>
            <?php
                for($i=1;$i<=3;$i++)
                    echo '<li> Giocatore '.$i.' </li>';
            ?>
        </ul>
    </li>
    <li>Difensori
        <ul>
            <?php
                for($i=1;$i<=8;$i++)
                    echo '<li> Giocatore '.$i.' </li>';
            ?>
        </ul>
    </li>
    <li>Centrocampisti
        <ul>
            <?php
                for($i=1;$i<=8;$i++)
                    echo '<li> Giocatore '.$i.' </li>';
            ?>
        </ul>
    </li>
    <li>Attaccanti
        <ul>
            <?php
                for($i=1;$i<=6;$i++)
                    echo '<li> Giocatore '.$i.' </li>';
            ?>
        </ul>
    </li>
</ul>
        
        <div id = "cont-campo">
            
            <img width="860" height"680" src = "../img/campo.png"/>

        </div> <!-- cont campo -->
        <?php
        //prendo i moduli consentiti
        //campionato corrente
        $camp = $_SESSION['current_camp'];
        $query = "SELECT modulo_343, modulo_352, modulo_361, modulo_433, modulo_442, modulo_451, modulo_253, modulo_334, modulo_424, modulo_532, modulo_541, modulo_550
        FROM campionato WHERE campionato.nome = '$camp'";
        $ris = mysql_query($query);
        if(!$ris){
                echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE<br><br> SI E\' VERIFICATO UN PROBLEMA
                <meta http-equiv="Refresh" content="3; URL=home.php?var=0"> </div></div>' ;
        }
    
        $vet = mysql_fetch_array($ris);
        $array = array(
                "343" => $vet['modulo_343'], 
                "352" => $vet['modulo_352'], 
                "361" => $vet['modulo_361'],
                "433" => $vet['modulo_433'],
                "442" => $vet['modulo_442'],
                "451" => $vet['modulo_451'],
                "253" => $vet['modulo_253'],
                "334" => $vet['modulo_334'],
                "424" => $vet['modulo_424'],
                "532" => $vet['modulo_532'],
                "541" => $vet['modulo_541'],
                "550" => $vet['modulo_550']
        );
        
           /* foreach ($array as $key => $value)
                echo'<option value = "'.$value.'"> '.$key.' </option>';*/
        
        ?>
        <div class = "modulo">
            <select>
                <?php foreach($array as $key => $value){
                            if($value)
                            echo ' <option value="'.$value.'"> '.$key.' </option>';
                    }
                ?>
            </select>
        </div>



        
        
        

    </div><!-- window -->

































    </body>

    </html>