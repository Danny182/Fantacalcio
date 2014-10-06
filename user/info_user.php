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
<link rel="stylesheet" href="../stili/style-user.css" type="text/css" media="screen" />
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

<?php
//user dell'utente da visualizzare
$userN = $_GET['user'];
//prendo l'id
    $query = "SELECT utente.id_utente FROM utente WHERE utente.user = '$userN'";
    $ris = mysql_query($query);
    @$row = mysql_fetch_array($ris);
    $id_utente_data = $row['id_utente'];

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


    <!-- cont -->
<?php
    //prendo tutti i dati dell'utente
    $userDates = array();
    $userDates = get_userdates($id_utente_data);
    //campionati
    $champions = array();
    $champions = get_leagues($id_utente_data);
    //squadre
    $teams = array();
    $teams = get_teamsname($id_utente_data);
    
?>
<a href = "../home.php?var=0" class = "no-color"><div class = "back">
Indietro
</div>
</a>

<div id = "cont-dati">

<div id = "divisore">
    Generalità
</div>


<div id = "cont-info" class = "nomeecog">

    <label for="nome">Nome & Cognome   </label><br>

        <input type = "text" name = "nome" id = "nome" size = "50" class = "nomeecog" value = "<?php foreach($userDates as $value){ $nome = $value['nome']; $cognome = $value['cognome']; echo ucfirst("$nome"); echo " "; echo  ucfirst("$cognome");} ?>"disabled=true/>

</div>

  <div id = "cont-info" class = "nascita">

    <label for="nascita" class = "nascita"> Luogo di Nascita   </label><br>

        <input type = "text" name = "nascita" id = "nascita" size = "50" class = "nomeecog" value = "<?php foreach($userDates as $value){ $citta = $value['citta']; echo ucfirst("$citta");} ?>"disabled=true/>

</div>

<div id = "cont-info" class = "data">

    <label for="nascita" class = "data"> Data di Nascita   </label><br>

        <input type = "text" name = "data" id = "data" size = "50" class = "nomeecog" value = "<?php foreach($userDates as $value) echo $value['data_nascita']; ?>"disabled=true/>

</div>

<div id = "cont-info" class = "userN">

    <label for="userN" class = "userN"> User Name   </label><br>

        <input type = "text" name = "userN" id = "userN" size = "50" class = "nomeecog" value = "<?php echo $userN; ?>"disabled=true/>

</div>

<div id = "cont-info" class = "email">

<label for="email" class = "email"> E-mail   </label><br>
<?php
    foreach($userDates as $value) $strg = $value['email'];
    $num = strlen($strg);
    if($num > 20)
        echo '<input type = "text" name = "email" id = "email" size = "50" class = "nomeecog email" value = "'.$strg.'"disabled=true/>';
    else
        echo '<input type = "text" name = "email" id = "email" size = "50" class = "nomeecog" value = "'.$strg.'"disabled=true/>';
    
    
    
    ?>


</div>

<div id = "cont-info" class = "camp">

<label for="camp" class = "camp"> Campionati   </label><br>
<ul class = "userChamp">
<?php foreach($champions as $value){ echo ' <li class = "userChamp"><a href = "#" class = "no-color">'.$value.' </a>'; echo "</li>";} ?>
</ul>

</div> <!-- camp -->

 <div id = "cont-info" class = "team">

<label for="team" class = "team"> Squadre   </label><br>
<ul class = "userChamp">
<?php foreach($teams as $value){ $id_team = $value['id_squadra']; echo ' <a href = "../squadre/info_team.php?id='.$id_team.'" class = "no-color"><li class = "userChamp">'.$value['nome'].'</a> '; echo "</li>";} ?>

</ul>


</div> <!-- team -->
<form action = "invia-notify.php" method = "POST" >
    <textarea name = "messaggio" class = "notify" id = "messaggio"  value = "Scrivi la notifica da inviare..."onclick="this.value='';" onblur  = "if(this.value == "") this.value = "Scrivi la notifica da inviare..."">
    Scrivi la notifica da inviare...
    </textarea>
    <input type = "hidden" name = "dest" id = "dest" value = "<?php echo $id_utente_data; ?>">

    <input type = "submit" class = "notify" value = "Invia Notifica">
</form>


</div><!-- cont dati -->

</div><!-- window -->

</div><!--  cont -->
</body>


</html>































</body>

</htlm>