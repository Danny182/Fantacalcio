    <?php
    	include("../session.php");
    	include("../connect_db.php");
        include("../funzioni/home_function.php");
        include("../funzioni/admin_area_function.php");
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <link rel="shortcut icon" href="../favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Home</title>
    <link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../stili/general-operation-admin.css" type="text/css" media="screen" />
    <script src="../librerie/jquery-1.11.0.min.js"/></script>
    <script type="text/javascript" src="../librerie/jquery.ajax-cross-origin.min.js"></script>

    <script type="text/javascript" src="../script/menu.js"></script>
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
$current_camp = $_SESSION['currentCamp'];
//prendo alcuni dati dell'utente(in questo caso nome e cognome)
$utente = get_userdates($id);

    foreach($utente as $value)
        $name_user = $value['nome'];
    
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
                        <a href="../    index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
                </div>
    <?php
        echo'<div id = "nome"><div id="nome-inside">'.$user.'</div><img id="button" src="../img/tool3.png" width="22px" height="22px">
        <br>
        <div id="dropdown">
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
        <a href="notifiche.php">
            <img id="button" width="26px" height="22px" src = "../img/notifica.png" />
        </a>
        </div>';
        
        else {echo'<div id = "notifiche" class = "arrivata">
            <a href="../notifiche.php"><div id="badge">'.$num_notifiche.'</div><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png"/></a></div>';}
        ?>
        </div>
    </div> <!-- top -->

    <div id = "window">
        <div id="menu" class = "admin">
            <div class="menu-principale-container">
                <ul id="menu-principale" class="menu">
                    <li id'"item-1" class="style-item-1" >
                        <a href="#">Gestione Utenti</a>
                    </li>
                    <li id'"item-1" class="style-item-2">
                        <a href="../formazione/change_formation.php">Modifica Rose</a>
                    </li>
                    <li id'"item-1" class="style-item-3">
                        <a href="../crea_campionato/crea-campionato.php">Modifica Formazioni</a>
                    </li>
                        <li id'"item-1" class="style-item-4">
                            <a href="../crea_squadra/crea-squadra.php">Documenti/Notifiche</a>
                    </li>
                    <li id'"item-1" class="style-item-6">
                        <a href="../notifiche.php">Votazioni Giornata</a>
                    </li>
                    <li id'"item-1" class="style-item-7">
                        <a href="change_admin.php">Cambia Admin</a>
                    </li>
                    <li id'"item-1" class="style-item-8">
                        <a href="home_area_admin.php?camp=<?php echo $current_camp ?>">Indietro</a>
                    </li>
                </ul>
            </div>
        </div> <!-- menu -->

        <div id = "ul-notizie" class = "admin">
            <div id = "cont-mister">
        </div>
        <div class = "rett">
        <div class = "tria">
        </div>  
        <div class = "cont-text">
            Ciao <b><?php echo ucfirst("$name_user") ?>!</b> Questa è l'area dedicata all'admin, da qui potrai amministrare tutto quello che riguarda il campionato. Come vedi è cambiato il <b>menù alla sinistra</b> dello schermo, in cui sono raggruppate tutte le operazioni che è possibile fare. La sezione <b>'Votazioni Giornata'</b> non sarà accessibile fino a quando non si saranno conluse tutte partite della giornata odierna. Se hai dubbi o problemi non esitare a contattare l'assistenza, <b>è sempre attiva</b>, A Presto!
        </div><!--text -->
        </div><!-- mister-->

        <div id="campo">    <!--decorazioni -->
            <div id = "porta1">
            </div>
            <div id="traversa">
            </div>
            <div id="traversa2">
            </div>
            <div id="mezzos">
            </div>
            <div id="mezzod">
            </div>
            <div id="dischettos">
            </div>
            <div id="dischettod">
            </div>
            <div id="areas">
            </div>
            <div id="areas2">
            </div>
            <div id = "linea">
            </div>
            <div id="centroc">
            </div>
            <div id="centro">
            </div>
            <div id = "porta2">
            </div>
            <div id = "ca">
            </div>
            <div id = "ca" class = "right1">
            </div>
            <div id = "ca" class = "left">
            </div>
            <div id = "ca" class = "right2">
            </div>
            </div>
        </div><!-- ul-notizie -->

        <div id = "cont-dati">
            <div class = "iscritti info">
                <form action = "check_newAdmin.php" method = "POST">
                    <div class = "title-iscritti change-admin">
                        User e Password dell'admin
                    </div>
                    <input type = "text" name = "user" value = "User Name" class = "user" onclick="this.value='';"/>
                    <input type = "text" name = "pass" value = "Password" class = "user pass" onclick="this.value='';"/>
                    <div class = "title-iscritti change-admin new-admin">
                        User nuovo Admin
                    </div>
                    <input type = "text" name = "userNew" value = "User Name" class = "user new" onclick="this.value='';"/>
                    <input type = "button" name = "inputAdmin" value = "Cambia" class = "invia-notify input-admin" />
                </form>
            </div> <!-- iscritti info -->
            <div class = "iscritti information">
                <ul>
                    <li class = "info-admin"> Inserisci i tuoi dati per motivi di sicurezza e successivamente l'user name del nuovo admin, <b>attenzione ai termini maiuscoli</b> </li>
                    <li class = "info-admin"> L'utente nominato nuovo admin riceverà una notifica e dovrà quindi accettare l'invito </li>
                    <li class = "info-admin"> Prima del cambio ufficiale riceverai una notifica con l'esito della precedente, accettando a tua volta ufficializzi il cambio </li>
            </div>



       


        </div><!-- cont-dati -->























</div><!---window -->

    