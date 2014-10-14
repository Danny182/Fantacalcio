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

<script type="text/javascript" src="../script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />
<script>



$(document).ready(function(){
                 
     
    $("a.delete-team").click(function(){
                             alert("dio boia");
                     });
                
      /*$("a.squadra").click(function(){
                         var camp = $(this);
                         var nome_camp = camp.attr("nome_camp");
                         var team = camp.attr("team");
                         
                         var data = 'data=' + nome_camp + '*' + team;
                         
                         if(confirm("Confermi l'eliminazione della squadra?"))
                         {
                            var request = $.ajax({
                                   type: "POST",
                                   url: "delete_team.php",
                                   data: data,
                                   dataType: "json",
                                   success: function() {},
                                   error:function() {}
                                   }); //Ajax
                           
                         } //if
                         return false;
    }); //click*/
                  
                  
                  
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
    
//nome del campionato selezionato
$nome_camp = $_GET['camp'];
$id = $_SESSION['id_utente'];
$num_notifiche = $_SESSION['notifiche'];

//prendo alcuni dati dell'utente(in questo caso nome e cognome)
$utente = get_userdates($id);



    foreach($utente as $chiave => $value){
        $name_user .= ucfirst("$value"); //metodo brutale per prendere solo il nome dell'utente
        break;
    }
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
                <a href="../home.php?var=0">Indietro</a>
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
        Ciao <b><?php echo $name_user ?>!</b> Questa è l'area dedicata all'admin, da qui potrai amministrare tutto quello che riguarda il campionato. Come vedi è cambiato il <b>menù alla sinistra</b> dello schermo, in cui sono raggruppate tutte le operazioni che è possibile fare. La sezione <b>'Votazioni Giornata'</b> non sarà accessibile fino a quando non si saranno conluse tutte partite della giornata odierna. Se hai dubbi o problemi non esitare a contattare l'assistenza, <b>è sempre attiva</b>, A Presto!
    </div><!--text -->
</div><!-- mister-->

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

<div id = "cont-dati">



<div class = "iscritti">
    <div class = "title-iscritti">
        Iscritti al Campionato
    </div>
<br>

<?php
    
    //lista dei giocatori iscritti al campionato selezionato
    //prendo l id del campionato selezionato
    $query = "SELECT campionato.id_campionato FROM campionato WHERE campionato.nome = '$nome_camp'";
    $ris = mysql_query($query);
    $row = mysql_fetch_array($ris);
    $id_camp = $row['id_campionato'];
    
   //prendo l'array composto così: NomeSquadra - AllenatoreSquadra
    $array = array();
    $array = get_user_champion($id_camp);
    foreach($array as $value){
        $team = $value['squadra'];
        //prendo l'user name da inviare alla pagine info_user
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $query = "SELECT utente.user FROM utente,squadra WHERE squadra.id_utente = utente.id_utente AND utente.nome = '$nome' AND utente.cognome = '$cognome' AND squadra.nome = '$team' ";
        @$ris = mysql_query($query);
        @$row = mysql_fetch_array($ris);
        @$userN = $row['user'];
        echo '<div class = "link"><a href="../user/info_user.php?user='.$userN.'" class="no-color">'.ucfirst($value['nome']).' '.ucfirst($value['cognome']).'</a>    -     <a href="delete_team.php?nomecamp='.$nome_camp.'&team='.$team.'"" class="squadra">'.$value['squadra'].'</a> <br></div>';
    }
    //delete_team.php?team='.$team.'&&camp='.$nome_camp.'
    
    
    
    
    
    
    ?>


</div> <!-- iscritti -->

<div class = "iscritti invita-utente">

<div class = "title-iscritti">
Invita utenti alla Lega
</div>

<br>
<form action = "add_user.php" method = "POST">

    <input type = "submit" class = "invia-notify" value = "Invia Richiesta" >
    <input type = "text" name = "dest" value = "User Name/E-mail" class = "dest" onclick="this.value='';"/>
    <input type = "hidden" name = "nomecamp" value = "<?php echo $nome_camp; ?>" >
    <input type = "hidden" name = "id_mitt" value = "<?php echo $id; ?>" >


    <textarea name = "messaggio" id = "messaggio" maxlenght = "50" value = ""onclick="this.value='';" onblur  = "if(this.value == "") this.value = "Scrivi il testo da allegare alla richietsa...">Scrivi il testo da allegare alla richiesta...
    </textarea>

</form>

</div> <!-- invita utente -->







<div class = "iscritti invia-notifica">

<div class = "title-iscritti">
    Invia una Notifica agli Iscritti
</div>

<form action = "invia_notify_all.php" method = "POST">



    <input type = "submit" class = "invia-notify all" value = "Invia" >
    <input type = "hidden" name = "nomecamp" value = "<?php echo $nome_camp; ?>" />

    <textarea name = "messaggio" class = "all" maxlenght = "50" id = "messaggio" value = "Scrivi il testo della notifica..."onclick="this.value='';" onblur  = "if(this.value == "") this.value = "Scrivi il testo della notifica...">Scrivi il testo della notifica...
    </textarea>
</form>
</div> <!-- invia notifica -->







</div>


</body>

</html>


























