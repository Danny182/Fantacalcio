<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/function_user.php");
    include("../funzioni/home_function.php");
    include("../funzioni/function-squadre.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/squadre.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />

<script src="../librerie/jquery-1.11.0.min.js"/></script>

<script type="text/javascript" src="../script/menu.js"></script>-->
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

</head>

<?php
    //user dell'utente da visualizzare
    $id_team = $_GET['id'];
    
    
    $id = $_SESSION['id_utente'];
    //prendo l'user dell'utente
    
    $username = get_user($id);
    //prendo le notifiche dell'utente
    $num_notifiche = get_notify($id);
    
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
                    <a href="index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
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
        <a href="notifiche.php">
            <img id="button" width="26px" height="22px" src = "../img/notifica.png" />
        </a>
    </div>';
    
    else {echo'<div id = "notifiche" class = "arrivata">
        <a href="notifiche.php"><div id="badge">'.$num_notifiche.'</div><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png"/></a></div>';}
        
        
        
        ?>


</div>
</div> <!-- top -->

<div id = "window">

    <div id="menu">
        <div class="menu-principale-container">
            <ul id="menu-principale" class="menu">
                <li id'"item-1" class="style-item-1" >
                    <a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
                </li>
                <li id'"item-1" class="style-item-2">
                    <a href="../formazione/change_formation.php">Inserisci Formazione</a>
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
                    <a href="../documenti.php">Documenti di lega</a>
                </li>
                <li id'"item-1" class="style-item-8">
                    <a href="../squadre/squadre.php?var=0">Le tue squadre</a>
                </li>
            </ul>
        </div>
    </div> <!-- menu -->

    <div id = "ul-notizie">
        <div id = "cont-mister">
        </div>
        <div class = "rett">
        <div class = "tria">
        </div>

        <div class = "cont-text">
            Curioso di conoscere le caratteristiche dei tuoi avversari? <b>Questo è il luogo giusto</b>, da qui puoi visualizzare tutte le informazioni di un utente. Potrai inviargli una notifica, una richiesta o quello che vorrai. <b>Se vuoi modificare i tuoi dati</b>, quelli che appariranno in questa pagine, clicca in alto a destra nel menu a tendina e procedi poi con "modifica Utente", da li portai <b>modificare tutti i tuoi dati personali.</b> Ciao <?php   echo ucfirst($username); ?>!
        </div>
    </div>

    <div id="campo">	<!--decorazioni -->
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


<?php
    
    //prendo tutti i dati della squadra
    $dates = get_datisquadraId($id_team);
    
    
?>

<a href = "../home.php?var=0" class = "no-color">
    <div class = "back">
    Indietro
    </div>
</a>

<div id = "cont-dati">
<?php
//prendo l'allenatore della squadra
$query = "SELECT squadra.id_utente FROM squadra WHERE squadra.id_squadra = '$id_team'";
$ris = mysql_query($query);
if(!$ris){
    echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
    <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
}
else{
    $row = mysql_fetch_array($ris);
    $id_user = $row['id_utente'];
    //prendo il nome del cognome dell'allenatore
    
    $query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente = '$id_user'";
    $ris = mysql_query($query);
    if(!$ris){
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    }
    else{
        $row = mysql_fetch_array($ris);
        $nome = ucfirst($row['nome']);
        $cog = ucfirst($row['cognome']);
        $mister = $nome.' '.$cog;
    }
}
?>


    <div id = "divisore" class = "infoteam">
        Generalità
<div class = "cont-mister"> Allenatore: <?php echo $mister; ?> </div>
    </div>

    <div id = "cont-input" class = "nome">
        <label for="squadra" class = "label-squadra">Nome   </label><br>
            <input type = "text" name = "squadra" id = "squadra" size = "50" class = "nome-squadra" value = "<?php foreach($dates as $value) echo $value['nome']; ?>" disabled=true />
    </div>

    <div id = "cont-input" class = "stemma">
        <div id = "cont-image">
            <?php foreach($dates as $value) $url_stemma = $value['logo'];  ?>
            <img src = "<?php echo $url_stemma ?>" width = "80px" height = "66px" />
        </div>
    <div id = "cont-foto" >
        <a href='#' class = "squadra" style="color:#9A9A9A;">Stemma</a>
    </div>
    </div><!-- stemma -->

    <div id = "cont-input" class = "camp">
        <label for="" class = "label-camp">Campionato</label>
        <?php
            //prendo l'id del campionato a cui è iscritta la squadra
            
            $query = "SELECT squadra.id_campionato FROM squadra WHERE squadra.id_squadra = '$id_team'";
            $ris = mysql_query($query);
            if(!$ris){
                echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
                <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
            }
            else{
                $row = mysql_fetch_array($ris);
                $id_camp = $row['id_campionato'];
                //prendo il nome del campionato
                $query = "SELECT campionato.nome FROM campionato WHERE campionato.id_campionato = '$id_camp'";
                $ris = mysql_query($query);
                if(!$ris){
                    echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
                    <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
                }
                else{
                    $row = mysql_fetch_array($ris);
                    $camp = $row['nome'];
                }
                
            }
        ?>
        <div id = "cont-camp">
            <?php if(empty($camp))echo "Nessuno"; else echo $camp;?>
        </div>
        </div><!-- cont input camp -->
        <div id = "divisore" class = "second">
            Stadio
        </div>

        <div id = "cont-input" class = "nome">
            <label for="stadio" class = "label-squadra">Nome  </label>
                <input type = "text" name = "stadio" id = "stadio" size = "50" class = "nome-squadra" value = "<?php  foreach($dates as $value)   echo $value['stadio']; ?>" disabled=true/>

        </div><!-- cont input stadio -->

        <div id = "cont-input" class = "stemma">
            <div id = "cont-image">
            <?php
                //prendo lo stadio
                foreach($dates as $value) $id_stadio = $value['id_stadio'];
                $query = "SELECT stadio.img FROM stadio WHERE id_stadio = '$id_stadio'";
                $ris = mysql_query($query);
                if(!$ris){
                    echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Si è verificato un problema
                    <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
                }
                else{
                    $row = mysql_fetch_array($ris);
                    $img = $row['img'];
                }
            ?>
            <img src = "<?php echo $img;?>" width = "80px" height = "66px">
            </div>
            <div id = "cont-foto" >
            <a href='#' class = "group" title = "Il castello Impenetrabile" style="color:#9A9A9A;"  >Stadio</a>
            </div>
        </div><!-- cont input stemma -->

        <div id = "divisore" class = "third">
            <label for = "storia">Storia/Caratteristiche</label>
        </div>
        <textarea name="storia" value = "" id = "storia" disabled=true><?php foreach($dates as $value) echo $value['storia'];?></textarea>















</div><!-- con dati -->




















