<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    foreach($utente as $chiave => $valore){
        $user .= ucfirst("$valore")." ";
        
    }
    if(isset($_COOKIE['href-img'])){
            $stadio=$_COOKIE['href-img'];
            $url_stadio = get_url($stadio);
    }
    else
    	$url_stadio = "../img/stadio/stadio1.png";
    	
    if(isset($_COOKIE['href-stemma'])){
    	$stemma = $_COOKIE['href-stemma'];
    	$url_stemma = get_url($stemma);
    }
    else
    $url_stemma = "../img/logo-squadra/fiorentina.jpg";
    
    
    
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creazione Squadra</title>


<link rel="stylesheet" href="../stili/crea-squadra.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />

<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />


<script src="../librerie/jquery-1.11.0.min.js"></script>
<script src="../librerie/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="colorbox.css" />

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




<script>
$(document).ready(function(){
                  //Examples of how to assign the Colorbox event to elements
                  
                  $("a.group").colorbox({rel:'group', transition:"fade"});
                  $("a.squadra").colorbox({rel:'squadra', transition:"fade"});
                  
                  
                  $("#click").click(function(){
                            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                            return false;
                                    });
                 
                                    $("a.group").colorbox({ current:""});
									$("a.squadra").colorbox({ current:""});
                  
                

                  $("a.group").colorbox({onClosed:function(){
                      var url = this.href;
                      document.cookie = 'href-img='+url + ';expires=0';
                      location.href="crea-squadra.php";
                     
                       }});
                  $("a.squadra").colorbox({onClosed:function(){
                                        var url = this.href;
                                        //document.cookie = 'href-stemma='+url;
                                        document.cookie = 'href-stemma='+url + ';expires=0';
                                        location.href="crea-squadra.php";
                                        
                                        }});

                  
                  });


</script>

<script>
$(document).ready(function() {
					$('#inserire_rosa input[type=radio]').click(function(){
                                                                   $('#inserire_rosa label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });
                    });
                    
                
</script>

</head>

<body class="crea-squadra-page">
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

    if($num_notifiche == 0) echo'<div id = "notifiche"><a href="notifiche.php"> Non hai Notifiche</a> </div>';
    
    else if($num_notifiche == 1) echo'<div id = "notifiche"><a href="notifiche.php"> Hai '.$num_notifiche.' nuova notifica</a> </div>';
    
    else echo'<div id = "notifiche"><a href="notifiche.php"> Hai '.$num_notifiche.' nuove notifiche</a> </div>';
    ?>
</div>
</div>


<div id = "windows">

    <div id="menu">
        <div class="menu-principale-container">
            <ul id="menu-principale" class="menu">
                <li id'"item-1" class="style-item-1">
                    <a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
                </li>
                <li id'"item-1" class="style-item-2">
                    <a href="inserisci_formazione.php">Inserisci la formazione</a>
                </li>
                <li id'"item-1" class="style-item-3">
                    <a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
                </li>
                <li id'"item-1" class="style-item-4">
                    <a href="#">Crea una nuova Squadra</a>
                </li>

                <li id'"item-1" class="style-item-6">
                    <a href="../notifiche.php">Notifiche</a>
                </li>
                <li id'"item-1" class="style-item-7">
                    <a href="documenti.php">Documenti di lega</a>
                </li>
                <li id'"item-1" class="style-item-7">
                    <a href="../squadre/squadre.php?var=0">Le tue squadre</a>
                </li>
            </ul>
        </div>
    </div>

<div id = "ul-notizie" class = "camp">
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

    </div><!--campo-->
</div><!-- ul-notizie -->

<div id = "divisore">
Generalità
</div>

<form action = "salva-squadra.php" method = "post" id = "form">

<div id = "cont-input" class = "nome">
<label for="squadra" class = "label-squadra">Nome</label>
<input type = "text" name = "nome_squadra" id = "squadra" size = "50" class = "nome-squadra" />
</div>

<div id = "cont-input" class = "stemma">

    <div id = "cont-image">
        <img src = "<?php echo $url_stemma; ?>" width = "60px" height = "50px">
    </div>


       <label for="logo" class = "label-logo">

            <a href='../img/logo-squadra/fiorentina.jpg' class = "squadra" title = "Fiorentina" style="color:black"  >Cambia</a>
            <a href='../img/logo-squadra/milan.jpg' class = "squadra" title = "Milan" style="display:none;"  >Cambia</a>
            

        </label>


</div><!--cont-input stemma -->

<div id = "divisore">
Stadio
</div>

<div id = "cont-input" class = "nome-stadio">
    <label for="stadio" class = "label-squadra">Nome dello stadio </label>
        <input type = "text" name = "stadio" id = "stadio" size = "50" class = "nome-squadra" />
</div><!--cont input-->



<div id = "cont-input" class = "stadio">


    <div id = "cont-image">

        
        <img src = "<?php echo $url_stadio; ?>" width = "60px" height = "50px">
    </div>


    <label for="nome" class = "label-logo">

        <a href='../img/stadio/stadio1.png' class = "group" title = "Stadio: La fortezza" style="color:black"  >Cambia</a>
        <a href='../img/stadio/stadio2.png' class = "group" title = "Stadio: L'incandescente" style="display:none;"  >Cambia</a>
        <a href='../img/stadio/stadio3.png' class = "group" title = "Stadio: L'imperatore" style="display:none;"  >Cambia</a>


    </label>


</div><!--cont-input stemma -->

<div id = "divisore" class = "second">
Storia/Caratteristiche
</div>

<textarea name="storia" class = "storia" value = "Scrivi qualcosa sulla tua squadra..."onclick="this.value='';" onblur  = "if(this.value == "") this.value = "Scrivi qualcosa sulla tua squadra...">
    Scrivi qualcosa sulla tua squadra...

</textarea>

<div id = "inserire_rosa" >
	<label for="nome" class = "inserire_rosa">Inserire rosa adesso?</label>				
	<div id="labels">
		<input type="radio" value="si" name="inserire_rosa" id="radio00" checked = "checked" onclick="this.form.inserire_rosa.disabled=true;"/>
		<label for="radio00" class = "crea-squadra" >Si</label>
		<input type="radio" value="no" name="inserire_rosa" id="radio01" onclick="this.form.inserire_rosa.disabled=false;" />
		<label for="radio01" class = "crea-squadra">No</label>
	</div>
</div>
<input type = "hidden" name = "url_stadio" value = "<?php echo $url_stadio; ?>" />
<input type = "hidden" name = "url_stemma" value = "<?php echo $url_stemma; ?>" />
<input type = "submit" value = "Crea la Squadra!" class = "reg-squadra" />

</form>


</div><!--window-->



</div><!-- fine cont-->

</body>


</html>


