<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    include("../funzioni/function-squadre.php");
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifica la squadra</title>
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/squadre.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />


<script src="../librerie/jquery-1.9.1.min.js"/></script>

<script type="text/javascript" src="../librerie/jquery.easing.1.3.js"></script>
<script type = "text/javascript" src = "../librerie/jquery.innerfade.js"> </script>

<script src="../librerie/jquery.min.js"></script>
<script src="../librerie/jquery.colorbox.js"></script>

<!-- STILE DEL MENù CON SCORRIMENTO IN VERTICALE
<script type="text/javascript" src="../script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />
<link rel="stylesheet" type="text/css" href="colorbox.css" />


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
                  $("a.squadra").colorbox({rel:'logo-squadra', transition:"fade"});
                  
                  
                  $("#click").click(function(){
                            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                            return false;
                                    });
                 
                                    $("a.group").colorbox({ current:""});
									$("a.squadra").colorbox({ current:""});
                  
                

                  $("a.group").colorbox({onClosed:function(){
                      var url = this.href;
                      document.cookie = 'href-stadio='+url + ';expires=0';
                      location.href="squadre.php";
                     
                       }});
                  $("a.squadra").colorbox({onClosed:function(){
                                        var url = this.href;
                                        document.cookie = 'href-stemma='+url;
                                        document.cookie = 'href-stsquadra='+url + ';expires=0';
                                        location.href="squadre.php";
                                        
                                        }});

                  
                  });


</script>


<?php
	$var = $_GET['var'];//la var serve per sapere se si viene da 
	//una pagina esterna oppure se l'utente ha solo cliccato su un'altra squadra
	//se � uguale a 1 l'utente ha cliccato su una squadra
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    $nomi_squadre = get_teamsname($id);
    
	
    if($var == 1){
		$nome_squadra = $_GET['squadra'];
		$squadre_dates = get_datisquadra($nome_squadra);
	}
	else
		$squadre_dates = get_squadradate_first($id);
		
	
		
		
    
    
    
    
    
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }    //prendo la lista delle squadre collegate all'utente
    
    
?>
<body class="le-tue-squadre">
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
    //num notifiche nella variabile $num_notifiche
    if($num_notifiche == 0) echo'<div id = "notifiche">
    <a href="notifiche.php">
    <img id="button" width="26px" height="22px" src = "../img/notifica.png" />
    </a>
    </div>';
    
    else echo'<div id = "notifiche" class = "arrivata"><a href="notifiche.php"><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png" /> </a> </div>';
    
    ?>

    </div>


</div>


<div id = "window">

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
                    <a href="../crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
                </li>

                <li id'"item-1" class="style-item-6">
                    <a href="../notifiche.php">Notifiche</a>
                </li>
                <li id'"item-1" class="style-item-7">
                    <a href="documenti.php">Documenti di lega</a>
                </li>
                <li id'"item-1" class="style-item-8">
                    <a href="#">Le tue squadre</a>
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
    
    <div id = "cont-campionati" class = "squadre">
		<?php 
			if(count($nomi_squadre) == 0){ //l'utente non ha squadre
                         
                       echo'<div id = "cont-campionati" class = "no-camp">Non hai nessuna squadra</div>
                       <div id = "cont-campionati" class = "esempio">Creane una adesso!</div>';
                    }
    		else{
				echo'<ul class = "camp-squadra">';
				foreach($nomi_squadre as $value){
				
				echo '<a href = "squadre.php?var=1&&squadra='.$value['nome'].'"><li class = "camp">'.$value['nome'].'</li></a>';
			}
		
			echo' </ul>';
    		echo'<div id="tool">
            	

    		</div>';
    	}
//fine tool

?>
    </div>
<?php
    foreach ($squadre_dates as $value)
        $id_team = $value['id_squadra'];
    echo '<a href = "delete_team.php?idteam='.$id_team.'&iduser='.$id.'"><input type = "submit" value = "Elimina la squadra" class = "reg-squadra delete-squadra" /></a>';
    ?>
     <form action = "salva-squadra.php" method = "post" id = "form">
     
    <div id = "cont-dati">

    	<div id = "divisore">
    	
			Generalità
			<input type = "submit" value = "Salva le modifiche" class = "reg-squadra" />


		</div>
		
		 <div id = "cont-input" class = "nome">

            <label for="squadra" class = "label-squadra">Nome   </label><br>
			
		   <input type = "text" name = "squadra" id = "squadra" size = "50" class = "nome-squadra" value = "<?php foreach($squadre_dates as $value) echo $value['nome']; ?>"/>

		</div>
		
		<div id = "cont-input" class = "stemma">
		
			<div id = "cont-image">
			<?php 
			//prendo l'url corretto dello stemma della squadra
			if(isset($_COOKIE['href-stsquadra'])){
				$stadio=$_COOKIE['href-stsquadra'];
				$url_stemma = get_url($stadio);
				
				
			}
			else foreach($squadre_dates as $value) $url_stemma = $value['logo'];
			
			
			?>
				   <img src = "<?php echo $url_stemma; ?>" width = "80px" height = "66px">
				
			</div>
			
			<div id = "cont-foto" >
			
				<a href='../img/logo-squadra/fiorentina.png' class = "squadra" title = "Fiorentina" style="color:#9A9A9A;"  >Foto</a>
				<a href='../img/logo-squadra/milan.png' class = "squadra" title = "Milan" style="display:none;"  >Foto</a>

            </div>
            
            

    </div><!-- stemma -->
    
    <div id = "cont-input" class = "camp">

            <label for="" class = "label-camp">Campionato  </label>

            <?php 

            //prendo il campionato a cui partecipa l'utente

            foreach($squadre_dates as $value) $id_camp = $value['id_camp'];

            $query = "SELECT campionato.nome FROM campionato WHERE id_campionato = '$id_camp'";
			$ris = mysql_query($query);
            if(!$ris){
                    echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA 
                    <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
            }
			$row = mysql_fetch_array($ris);
			$nome_camp = $row['nome'];

            ?>

            <div id = "cont-camp">

            	<?php if(empty($nome_camp))echo "Nessuno"; else echo $nome_camp;?>

            </div>

   </div><!-- cont input camp -->
   
	<div id = "divisore" class = "second">

		Stadio

	</div>
	
	<div id = "cont-input" class = "nome">

		<label for="stadio" class = "label-squadra">Nome  </label>
		<input type = "text" name = "stadio" id = "stadio" size = "50" class = "nome-squadra" value = "<?php  foreach($squadre_dates as $value) if(!empty($value['stadio']))echo $value['stadio']; else echo "Pireaccioli rossi"; ?>"/>

	</div><!-- cont input stadio -->
	
	<div id = "cont-input" class = "stemma">
		
			<div id = "cont-image">
			<?php 
			//prendo l'immagine dello stadio della squadra
			if(isset($_COOKIE['href-stadio'])){
				$stadio=$_COOKIE['href-stadio'];
				$url_stadio = get_url($stadio);
				
			}
			else{
				foreach($squadre_dates as $value) $id_stadio = $value['id_stadio'];
				$query = "SELECT stadio.img FROM stadio WHERE id_stadio = '$id_stadio'";
				$ris = mysql_query($query);
                if(!$ris){
                        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA (1)
                        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
                }
				$row = mysql_fetch_array($ris);
				$url_stadio = $row['img'];
			}
			
			
			
			?>
				<img src = "<?php echo $url_stadio;?>" width = "80px" height = "66px">
			</div>
			
			<div id = "cont-foto" >
			
				<a href='../img/stadio/stadio1.png' class = "group" title = "Il castello Impenetrabile" style="color:#9A9A9A;"  >Foto</a>
				<a href='../img/stadio/stadio2.png' class = "group" title = "Il Tempio del Gladiatore" style="display:none;"  >Foto</a>
				<a href='../img/stadio/stadio3.png' class = "group" title = "L'arena incandescente" style="display:none;"  >Foto</a>

            </div>
            
            

    </div><!-- cont input stemma -->
    
    <div id = "divisore" class = "third">

		<label for = "storia">Storia/Caratteristiche</label>

	</div>
	
	<textarea name="storia" value = "<?php foreach($squadre_dates as $value) echo $value['storia'];?>" id = "storia" ><?php foreach($squadre_dates as $value) if(!empty($value['storia']))echo $value['storia']; else echo "Scrivi la storia della tua squadra!";?></textarea>


    <?php
    //controllo che la squadra sia iscritta al campionato
    /*$query = "SELECT squadra.iscritta FROM squadra WHERE squadra.id_utente = '$id'";
    $ris = mysql_query($query);
    if(!$ris){
    echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> SI E\' VERIFICATO UN PROBLEMA (1)
        <meta http-equiv="Refresh" content="3; URL=../home.php?var=0"> </div></div>' ;
    }
    $vet = mysql_fetch_array($ris);
    $iscritta = $vet['iscritta'];*/
    foreach($squadre_dates as $value) $iscritta = $value['iscritta'];
    if($iscritta){ //appare il link per modificare la rosa
        //prendo l'id della squadra da inviare all'insert rosa
        foreach($squadre_dates as $value)
            $id_team = $value['id_squadra'];
        //prendo l'id del campionato a cui partecipa questa squadra (esiste per forza)
        $id_camp = get_id_camp_by_id_team($id_team);
        echo'<div id = "divisore" class = "fourthy">
            <label for = "storia"><a href = "insert-rosa.php?id_team = '.$id_team.'&&id_camp='.$id_camp.'">Vedi/Modifica La Rosa </a></label>
        </div>';
    }
    else{
        echo'<div id = "divisore" class = "fourthy">
            <label for = "storia">Iscriviti ad un campionato!</label>
        </div>';
    }
    ?>

    <input type = "hidden" name = "url_stadio" value = "<?php echo $url_stadio; ?>" />
    <input type = "hidden" name = "url_stemma" value = "<?php echo $url_stemma; ?>" />

    <!--passo i dati salvati nel db, serviranno alla pagina di salvataggio-->

    <input type = "hidden" name = "nome_squadra" value = "<?php foreach($squadre_dates as $value)echo $value['nome']; ?>" />
    <input type = "hidden" name = "storia_squadra" value = "<?php foreach($squadre_dates as $value)echo $value['storia']; ?>" />
    <input type = "hidden" name = "stadio_squadra" value = "<?php foreach($squadre_dates as $value)echo $value['stadio']; ?>" />


    </form>
    

    
    
        
     </div><!-- cont dati -->
    
   

</div><!--  window -->

</div><!--  cont -->


</body>



</html>


















