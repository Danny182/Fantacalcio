<?php
	include("session.php");
	include("connect_db.php");
    include("funzioni/notify_function.php");
    include("funzioni/home_function.php");
   
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notifiche</title>
<link rel="stylesheet" href="stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="stili/style-notifiche.css" type="text/css" media="screen" />
<link rel="stylesheet" href="stili/campo-calcio.css" type="text/css" media="screen" />
<script src="librerie/jquery-1.9.1.min.js"/></script>

<script type="text/javascript" src="librerie/jquery.easing.1.3.js"></script>
<script type = "text/javascript" src = "librerie/jquery.innerfade.js"> </script>

<!-- STILE DEL MENù CON SCORRIMENTO IN VERTICALE
<script type="text/javascript" src="script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="stili/menu2.css" />

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

<script type="text/javascript" >
$(function() {
	$(".link").click(function(){
		
		var id = $(this);
		var id_notifica = id.attr("id");
		var info = 'id=' + id_notifica;
		if(confirm("Cancellare la notifica?"))
		  {
			$.ajax({
				   type: "GET",
				   url: "delete-single-notify.php",
				   data: info,
				   success: function(){}
			}); //Ajax
			
			$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
		  } //if
			return false;
			
	}); //.click function
}); //function
	

</script>


</head>

<?php
    
$id = $_SESSION['id_utente'];
    
//essendo entrati nella pagine delle notifiche azzero le notifiche non lette, impostando tutti i valori a true
    $query = "UPDATE notifica SET letta = true WHERE id_utente = '$id'";
    @$ris = mysql_query($query);
    $_SESSION['notifiche'] = 0;
    $num_notifiche = 0;
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
?>

<body class="notifiche">
    <div id = "cont">
        <div id="top">
            <div id="top-insize">
                <div id="top-logo">
                    <a href="index.php"><img src="img/4.png" width="100px" height="75px" /></a>
        </div>
<?php
    echo'<div id = "nome"><div id="nome-inside">'.$user.'</div><img id="button" src="img/tool3.png" width="22px" height="22px">
            <br><div id="dropdown">
                <ul id="menu_utente">
                    <a class="user_color" href="user/modifica.php">
                        <li id="menu_utente">
                            modifica utente
                        </li>
                    </a>
                        <a class="user_color" href="user/log-out.php">
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
    <img id="button" width="26px" height="22px" src = "img/notifica.png" />
    </a>
    </div>';
    
    else echo'<div id = "notifiche" class = "arrivata"><a href="notifiche.php"><img id="button" width="26px" height="22px" src = "img/notifica-arrivata.png" /> </a> </div>';
    
    ?>

</div>


</div>


<div id = "window">

    <div id="menu">
        <div class="menu-principale-container">
        <ul id="menu-principale" class="menu">
            <li id'"item-1" class="style-item-1">
                <a href="home.php?var=0"><img src="img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
            </li>
            <li id'"item-1" class="style-item-2">
                <a href="inserisci_formazione.php">Inserisci la formazione</a>
            </li>
            <li id'"item-1" class="style-item-3">
                <a href="crea_campionato/crea-campionato.php">Crea un Campionato</a>
            </li>
            <li id'"item-1" class="style-item-4">
                <a href="crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
            </li>

            <li id'"item-1" class="style-item-6">
                <a href="#">Notifiche</a>
            </li>
            <li id'"item-1" class="style-item-7">
                <a href="documenti.php">Documenti di lega</a>
            </li>
            <li id'"item-1" class="style-item-7">
                <a href="squadre/squadre.php?var=o">Le tue squadre</a>
            </li>
        </ul>
    </div>
</div>

<div id = "ul-notizie">
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

<div id = "cont-notifiche">

<?php
    
    //prendo le notifiche dell'utente
    $notifiche = get_notifyuser($id);
    if(count($notifiche) == 0){
        echo '<div id = "cont-notify" class = "no"> <br>Non ci sono notifiche </div>';
        }
    else{
		
        foreach($notifiche as $value){
			
            $id_notifica = $value['id_notifica'];
            $mittente = ucfirst(get_user($value['mitt'])); //prendo l'user del mittente
            
            echo'<div id = "cont-notify" class = "record"><a href = "#" id = "'.$id_notifica.'" class = "link"><div id = "delete"></div></a> <i style="color:#018DB0;">Oggetto</i>: '.$value['tipo'].' &nbsp;&nbsp; <i style="color:#018DB0;">Mittente</i>: '.$mittente.'  <br><br> '.$value['testo'].' </div>';
            $mittente = "";
        }
        
        
        
    }
    ?>



</div>

<div id = "notify-menu">

    <ul class = "notify">
        <a href = "user/invia-notifica.php"><li class = "notify"> Invia una notifica </li></a>
        <a href = "user/delete-notify.php?id=<?php echo $id;?>"><li class = "notify"> Cancella tutte le notifiche </li></a>
    </ul>
</div>



</div>

</div><!--windows-->




</body>

</html>









































