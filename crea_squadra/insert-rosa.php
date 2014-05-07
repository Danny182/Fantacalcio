<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);    
    foreach($utente as $chiave => $valore){
        @$user .= ucfirst("$valore")." ";        
    }        
	
	//prendo i dati dal form e li metto nei cookie	
	setcookie("crea_squadra[nome]", $_GET['nome_squadra'], 0);
	setcookie("crea_squadra[stadio]", $_GET['nome_stadio'], 0);
	setcookie("crea_squadra[storia]", $_GET['storia'], 0);
	setcookie("crea_squadra[url_stadio]", $_GET['url_stadio'], 0);
	setcookie("crea_squadra[url_stemma]", $_GET['url_stemma'], 0);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserimento rosa</title>


<link rel="stylesheet" href="../stili/crea-squadra.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />
<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />


<script src="../librerie/jquery-1.11.0.min.js"></script>
<script src="../librerie/list.js"></script>

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
	<div id="your-team">
		your team
	</div>
	<div id="players">
		<div id="options">
			<input class="search" placeholder="Cerca"/>
			<div class="filter">
					<select id="teams">
						<option value="tutte" selected>Squadre</option>
						<option value="atalanta">Atalanta</option>
						<option value="bologna">Bologna</option>
						<option value="cagliari">Cagliari</option>
						<option value="catania">Catania</option>
						<option value="chievo">Chievo</option>
						<option value="fiorentina">Fiorentina</option>
						<option value="genoa">Genoa</option>
						<option value="verona">Hella Verona</option>
						<option value="inter">Inter</option>
						<option value="juventus">Juventus</option>
						<option value="lazio">Lazio</option>
						<option value="livorno">Livorno</option>
						<option value="milan">Milan</option>
						<option value="napoli">Napoli</option>
						<option value="parma">Parma</option>
						<option value="roma">Roma</option>				
						<option value="sampdoria">Sampdoria</option>
						<option value="sassuolo">Sassuolo</option>
						<option value="torino">Torino</option>				
						<option value="udinese">Udinese</option>
					</select>
			</div>
		</div>
		<div id="list">
			<div id="button-cont">
				<button id="ruolo" class="sort" data-sort="ruolo">
						Ruolo
				</button>
				<button id="squadra" class="sort" data-sort="squadra">
						Squadra
				</button>
				
				<button id="nome" class="sort" data-sort="nome">
						Nome
				</button>
				<button id="valore" class="sort" data-sort="valore">
						Valore
				</button>
			</div>
			<ul class="list">
			<?php
				$query="SELECT ruolo, cognome, valore, squadra FROM giocatore ORDER BY squadra";
				$ris = mysql_query($query);
				while ($vet = mysql_fetch_array($ris)) {					
					echo "<li class='player'>
								<span class='team' style='display:none;'>$vet[squadra]</span>
								<span class='ruolo'>
									$vet[ruolo]
								</span>
								<span class='squadra'>
									<img width='18px' height='18px' src='../img/logo-squadra/$vet[squadra].png'>
								</span>
								<span class='nome'>
									$vet[cognome]
								</span>
								<span class='valore'>
									$vet[valore]
								</span>								
							</li>";				
				}			
			?>      
			</ul>
		</div>
	</div>
</div>
		
</body>

</html>
<script>
$(document).ready(function(){
	var options = {
		valueNames: ['squadra', 'ruolo', 'nome', 'valore', 'team' ]
	};

	var userList = new List('players', options);

	
	$('#teams').change(function () {
		var selection = this.value; 
		console.log (selection);
		if (selection == "tutte") {
			userList.filter();
			return false;
		}
		userList.filter(function(item) {
		
		if (item.values().team == selection) {
		  return true;
		} else {
		  return false;
		}
	  });
	  return false;
	});
});
</script>
