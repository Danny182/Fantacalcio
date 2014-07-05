<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
   ?>
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<?php
    @$id = $_SESSION['id_utente'];
    $var = $_GET['var'];//variabile per sapere se vengo dalla notifica oppure se è solo cambiata la squadra
    //se var è = 1 si viene da iscrivi-squadra altrimenti si viene dalla notifica
   
    if($var == 0){//devo prendere i dati della prima squadra
        $teams = get_teams($id);
        if(empty($teams)){
            echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Sei già iscritto al campionato <br> Oppure non hai una squadra disponibile
            <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
            die;
        }
        foreach($teams as $value){
            $team = $value['nome'];
            $stadio_ = $value['stadio'];
            break;
        }//metodo brutale per prendere solo la prima squadra dell'utente
       @$id_camp = $_GET['id_camp'];
        $_SESSION['id_campionato'] = $id_camp;
       
    }
    else{
        $team = $_GET['squadra'];
        $stadio_ = get_teamsdates($team, $id);
        
        
        
    }
    
    $nome_squadre = get_teams($id);
    $id_campionato = $_SESSION['id_campionato'];
    //prendo i campionati a cui partecipa la squadra
    $query = "SELECT campionato.nome FROM campionato, squadra WHERE campionato.id_campionato = squadra.id_campionato AND id_campionato = '$id_camp' AND squadra.nome = '$team'";
    @$ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $campionato = $ros['nome'];
   
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iscrivi la squadra</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<script src="../librerie/jquery-1.9.1.min.js"/></script>
<script src="../librerie/jquery-ui-1.10.3.custom.min.js."></script>
<script type="text/javascript" src="../librerie/jquery.easing.1.3.js"></script>
<script type = "text/javascript" src = "../librerie/jquery.innerfade.js"> </script>


<!-- STILE DEL MENù CON SCORRIMENTO IN VERTICALE
<script type="text/javascript" src="../script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />

<?php
    //prendo le notifiche dell'utente
    $num_notifiche = get_notify($id);
    $_SESSION['notifiche'] = $num_notifiche;//le metto in sessione
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    
    foreach($utente as $chiave => $valore){
        $user .= ucfirst("$valore")." ";
        
   }
    
?>

body>
<div id = "cont">
<div id="top">
<div id="top-insize">
<div id="top-logo">
<a href="../home.php"><img src="../img/4.png" width="100px" height="75px" /></a>
</div>
<?php
    echo'<div id = "nome">'.$user.'</div>';
    if($num_notifiche == 0) echo'<div id = "notifiche"><a href="notifiche.php"><img src = "../img/notifica.gif" /> </a> </div>';
			
			else echo'<div id = "notifiche" class = "arrivata"><a href="notifiche.php"><img src = "../img/notifica-arrivata.png" /> </a> </div>';
    
    ?>

</div>


</div>


<div id = "window">
    <div id="menu">
        <div class="menu-principale-container">
            <ul id="menu-principale" class="menu">
                <li id'"item-1" class="style-item-1">
                    <a href="../home.php?var=0">Home</a>
                </li>
                <li id'"item-1" class="style-item-2">
                    <a href="inserisci_formazione.php">Inserisci la formazione</a>
                </li>
                <li id'"item-1" class="style-item-3">
                    <a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
                </li>
                <li id'"item-1" class="style-item-4">
                    <a href="--/crea_squadra/crea_squadra.php">Crea una nuova Squadra</a>
                </li>

                <li id'"item-1" class="style-item-6">
                    <a href="../notifiche.php">Notifiche</a>
                </li>
                <li id'"item-1" class="style-item-7">
                    <a href="documenti.php">Documenti di lega</a>
                </li>
                <li id'"item-1" class="style-item-7">
                    <a href="../squadre/squadre.php">Le tue squadre</a>
                </li>
            </ul>
        </div>
    </div>

<div id = "cont-squadre">


Squadra: <i style="color:rgba(1, 159, 199, 0.61);"><?php echo  $team;?></i> &nbsp;&nbsp; Allenatore:<i style="color:rgba(1, 159, 199, 0.61);"> <?php echo  "$user";?></i> <br>Campionato
a cui partecipa: <i style="color:rgba(1, 159, 199, 0.61);"><?php if(!empty($campionato)) echo $campionato; else echo "Nessuno (puoi iscrivere la squadra)";?> </i><br>Stadio:<i style="color:rgba(1, 159, 199, 0.61);"> <?php echo  "$stadio_";?></i>



    





</div><!--cont squadre -->

<?php
    
    echo'<ul class = "squadre">';
    foreach($nome_squadre as $value){
        echo '<a href = "iscrivi-squadra.php?var=1&&squadra='.$value['nome'].'"><li class = "squadre">'.$value['nome'].'</li></a>';
    }
    echo'<a href = "salva-squadra.php?squadra='.$value['nome'].'&&id_camp='.$id_campionato.'"><li class = "squadre"style="background-color:rgba(1, 159, 199, 0.61);">Iscrivi La Squadra</li></a>';
    echo '<li class = "squadre-crea"> Crea una nuova squadra </li>';
    echo' </ul>';
    
    ?>

</div><!--window>







</body>



</html>
