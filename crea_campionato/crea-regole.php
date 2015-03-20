<?php
    include("../session.php");
    include("../connect_db.php");
    include("../funzioni/home_function.php");
    $nome_camp = $_GET['nome'];
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
  /*  //prendo l id del campionato
    $query = "SELECT id_campionato FROM campionato WHERE campionato.nome = '$nome_camp'";
    $ris = mysql_query($query);
    $vet = mysql_fetch_array($ris);
    $id_camp = $vet['id_campionato'];*/
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }

    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creazione Campionato</title>

<script src="../librerie/jquery-1.11.0.min.js"/></script>
<script type="text/javascript" src="../script/crea-camp.js"/></script>//script per la grafica dei radio buttons


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />


</head>

<body class="crea-camp-page">
<div id = "cont">
	<div id="top">
		<div id="top-insize">
			<div id="top-logo">
				<a href="../index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
			</div>
			<?php
				echo'<div id = "nome">'.$user.'</div>';
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

<div id = "windows">
	<div id="menu">
			<div class="menu-principale-container">
				<ul id="menu-principale" class="menu">
					<li id'"item-1" class="style-item-1">
						<a href="../home.php">Home</a>
					</li>
					<li id'"item-1" class="style-item-2">
						<a href="inserisci_formazione.php">Inserisci la formazione</a>
					</li>
					<li id'"item-1" class="style-item-3">
						<a href="../crea_campionato/crea-campionato.php">Crea un Campionato</a>
					</li>
					<li id'"item-1" class="style-item-4">
						<a href="crea_squadra.php">Crea una nuova Squadra</a>
					</li>

					<li id'"item-1" class="style-item-6">
						<a href="messaggi.php">Messaggi</a>
					</li>
					<li id'"item-1" class="style-item-7">
						<a href="documenti.php">Documenti di lega</a>
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
	<?php

	?>
	<div id = "sotto-wind">
		<form action = "" method = "post" id = "form">			

			<div id="cont-label" class="regole">
				<label for="nome" class = "crea-camp-title">Utilizzare regole FantaGazzetta?<br><font size="-3"><i class="description">(potrai modificare le regole in seguito)</i></font></label>											
					<div id="labels">
						<input type="radio" value="si" name="regole" id="radio1" checked = "true"  />
						<label for="radio1" class = "crea-camp active" >Si</label>
						<input type="radio" value="no" name="regole" id="radio2"  />
						<label for="radio2" class = "crea-camp">No</label>
					</div>
			</div>				
			

			<div id = "cont-label"  class = "formazione">
				<label for="nome" class = "crea-camp-title"> Inserire la formazione automaticamente?</label>
				
				<div id="labels">
					<input type="radio" value="si" name="formazione_automatica" id="radio10" checked = "checked" onclick="this.form.penalita.disabled=true;"/>
					<label for="radio10" class = "crea-camp active" >Si</label>
					<input type="radio" value="no" name="formazione_automatica" id="radio11" onclick="this.form.penalita.disabled=false;" />
					<label for="radio11" class = "crea-camp">No</label>
				</div>
			</div>

			<div id = "cont-label" class = "penalita">
				<label for="nome" class = "crea-camp-title">Punti di penalità in caso di mancato inserimento</label>
				<input type = "text" name = "penalita" id = "penalita" size = "5" class = "crea-camp-penalita" disabled = "true" value = "0" />
			</div>

			 <input type = "submit" value = "Salva le regole" class = "reg-regole" />
			
		</form>
		<?php
			@$formazione = $_POST['formazione_automatica'];
			@$penalita = $_POST['penalita'];
			@$where=0;
			//se viene scelto di modificare le regole
			if (@strcmp($_POST['regole'],"no")==0)	
				echo'<meta http-equiv="refresh" content="0;url=modifica-regole.php?nome='.$nome_camp.'&formazione='.$formazione.'&penalita='.$penalita.'">';
			//se viene scelto di mantenere le regole Fantagazzetta
			if (@strcmp($_POST['regole'],'si')==0)	
				echo'<meta http-equiv="refresh" content="0; url=salva-regole.php?where=0&nome='.$nome_camp.'&formazione_automatica='.$formazione.'&penalita='.$penalita.'">';
		?>
	</div>


</div>
</div><!--cont-->

</body>
</html>





























