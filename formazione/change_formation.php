    <?php
    	include("../session.php");
    	include("../connect_db.php");
        include("../funzioni/home_function.php");
        include("../funzioni/gest_campionato_function.php");
        include("../funzioni/formazione_functions.php");
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
    <link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../stili/slicknav.css" />
    <script src="../librerie/jquery.slicknav.min.js" type="text/css" media="screen"></script>
    <script src="../librerie/jquery-1.11.0.min.js"/></script>
    

    <script type="text/javascript" src="../script/menu.js"></script>
    <script type="text/javascript" src="../script/menu-formazione.js"></script>
    <script type="text/javascript" src="../script/change_module.js"></script>
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
                      //setto il 343 come modulo di default
                        $(".dif1").addClass('non-active');
                        $(".dif5").addClass('non-active');
                        $(".cen1").addClass('non-active');
                      
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
            <select onchange="change_module(this.value)">
                <?php foreach($array as $key => $value){
                            if($value)
                            echo ' <option value="'.$key.'"> '.$key.' </option>';
                    }
                ?>
            </select>
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
    <div id = "cont-campo">
            
            <img width="860" height"680" src = "../img/campo.png"/>


            <div id = "ruolo" class = "port">
                <img src="../img/t-shirts formazione/man_por.png" width="25" height="20" align="center" />
                    Portieri
            </div>

            <div id = "ruolo" class = "dif1">
                <img src="../img/t-shirts formazione/man_dif.png" width="25" height="20" align="center" />
                Difensore
            </div>
            <div id = "ruolo" class = "dif2">
                <img src="../img/t-shirts formazione/man_dif.png" width="25" height="20" align="center" />
                Difensore
            </div>
            <div id = "ruolo" class = "dif3">
                <img src="../img/t-shirts formazione/man_dif.png" width="25" height="20" align="center" />
                Difensore
            </div>
            <div id = "ruolo" class = "dif4">
                <img src="../img/t-shirts formazione/man_dif.png" width="25" height="20" align="center" />
                Difensore
            </div>
            <div id = "ruolo" class = "dif5">
                <img src="../img/t-shirts formazione/man_dif.png" width="25" height="20" align="center" />
                Difensore
            </div>

            <div id = "ruolo" class = "cen1">
                <img src="../img/t-shirts formazione/man_cen.png" width="25" height="20" align="center" />
                Centrocampista
            </div>
            <div id = "ruolo" class = "cen2">
                <img src="../img/t-shirts formazione/man_cen.png" width="25" height="20" align="center" />
                Centrocampista
            </div>
            <div id = "ruolo" class = "cen3">
                <img src="../img/t-shirts formazione/man_cen.png" width="25" height="20" align="center" />
                Centrocampista
            </div>
            <div id = "ruolo" class = "cen4">
                <img src="../img/t-shirts formazione/man_cen.png" width="25" height="20" align="center" />
                Centrocampista 
            </div>
            <div id = "ruolo" class = "cen5">
                <img src="../img/t-shirts formazione/man_cen.png" width="25" height="20" align="center" />
                Centrocampista
            </div>

            <div id = "ruolo" class = "att1">
                <img src="../img/t-shirts formazione/man_att.png" width="25" height="20" align="center" />
                Attaccante
            </div>
            <div id = "ruolo" class = "att2">
                <img src="../img/t-shirts formazione/man_att.png" width="25" height="20" align="center" />
                Attaccante
            </div>
            <div id = "ruolo" class = "att3">
                <img src="../img/t-shirts formazione/man_att.png" width="25" height="20" align="center" />
                Attaccante
            </div>
            

        </div> <!-- cont campo -->
    <?php
    //prendo la lista dei giocatori della squadra
    //campionato corrente 
    $current_camp = $_SESSION['current_camp'];
    //prendo l'id del campionato
    $id_camp = get_id_champion($current_camp);
    //prendo l'id della squadra inviando sia l'id del campionato sia l'id del l'utente
    $id_team = get_team_id_by_team_user($id, $id_camp);

    $query = "SELECT appartiene.id_giocatore FROM appartiene WHERE appartiene.id_squadra = '$id_team'";
    $ris = mysql_query($query);
    if(!$ris){
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA
        <meta http-equiv="Refresh" content="3; URL=../home.php"> </div></div>' ;
        }
    //setto la rosa della squadra
    $app = mysql_fetch_array($ris);
    if(!empty($app)) //controllo se l'utente non ha una rosa
    include("set_rosa_team.php");
    else {
        echo' 
       <ul id="nav">

            <li class = "no-rosa"><a href="#">Non hai creato nessuna rosa</a>
                <ul>';
            }
    
       
    ?>

        
    </div><!-- window -->

































    </body>

    </html>