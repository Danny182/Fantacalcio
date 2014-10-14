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
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user = ucfirst("$nome")." ".ucfirst("$cognome");
        
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






















