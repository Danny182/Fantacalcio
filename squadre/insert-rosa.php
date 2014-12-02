<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    include("../funzioni/gest_campionato_function.php");
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        @$user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
	
	/*//prendo i dati dal form e li metto nei cookie	
	setcookie("crea_squadra_nome", $_POST['nome_squadra'], 0);
	setcookie("crea_squadra_stadio", $_POST['stadio'], 0);
	setcookie("crea_squadra_storia", $_POST['storia'], 0);
	setcookie("crea_squadra_urlStadio", $_POST['url_stadio'], 0);
	setcookie("crea_squadra_urlStemma", $_POST['url_stemma'], 0);
	*/

	//prendo id squadra e id campionato dalla pagina squadre.php (si arriva solo da li)
	$id_team = $_GET['id_team'];
	$id_camp = $_GET['id_camp'];
	//prendo le regole del campionato dalla funzione get_rules nel file gest_campionato_function (dentro funzioni)
	$regole = array();
	$regole = get_rules($id_camp);
	/*
		l'array si scorre con il normale foreach
		EX: Voglio prendere il numero dei partecipanti: foreach($regole as $value) $n_part = $value['n_part'];
	*/

	





	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FaYnt | Rosa</title>


<link rel="stylesheet" href="../stili/crea-squadra.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />
<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />


<!-- libreria jquery -->
<script src="../librerie/jquery-1.11.0.min.js"></script>
<!-- script che gestisce le opzioni sul sorting, sui filtri, e sullo spostamente all'interno della lista -->
<script src="../script/listOptions.js"></script>
<!-- libreria e vari bundle per ordinamento e filtri lista -->
<script src="../librerie/jplist-core.min.js"></script>
<script src="../librerie/jplist.filter-dropdown-bundle.min.js"></script>
<script src="../librerie/jplist.textbox-control.min.js"></script>
<script src="../librerie/jplist.filter-toggle-bundle.min.js"></script>
<script src="../librerie/jplist.sort-bundle.min.js"></script>




<!-- script per la comparsa e la scomparsa del menu in alto a destra dell'utente -->
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
</div>
<form action = "salva_squadra_rosa.php" method = "POST" id = "saveTeam">
	<input type = "submit" value = "Salva" class = "saveTeam" id = "button"/>
</form>
<form action = "crea-squadra.php" method = "POST">
	<?php /* faccio ritornare i dati a crea squadra.php */ ?>
	<input type = "submit" value = "Indietro" class = "saveTeam back" />
	<input type = "hidden" name = "nome_squadra" value = "<?php echo $_POST['nome_squadra']; ?>" />
	<input type = "hidden" name = "nome_stadio" value = "<?php echo $_POST['stadio'];  ?>" />
	<input type = "hidden" name = "storia" value = "<?php echo $_POST['storia']; ?>" />
</form>
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
		<div id='teamName'>
			<?php echo	$_POST['nome_squadra'];					
			?>
		</div>
		<div id="listBox">
			<ul id="lista" class="your">
			</ul>
		</div>
	</div>

	<div id="players">
		<div class="jplist-panel">
			<div id="options">

				<div class="text-filter-box">

					<i class="search  jplist-icon"></i>

					<!--[if lt IE 10]>
					<div class="jplist-label">Cerca:</div>
					<![endif]-->

					<input 
					class="search"
					data-path=".nome" 
					type="text" 
					value="" 
					placeholder="Cerca" 
					data-control-type="textbox" 
					data-control-name="title-filter" 
					data-control-action="filter"
					/>
				</div>


				<div class="filter">
					<select id="teams"
					class="jplist-select"
					data-control-type="filter-select"
					data-control-name="team-filter" 
					data-control-action="filter">

						<option data-path="default" value="tutte" selected>Squadre</option>
						<option data-path=".atalanta" value="atalanta">Atalanta</option>
						<option data-path=".bologna" value="bologna">Bologna</option>
						<option data-path=".cagliari" value="cagliari">Cagliari</option>
						<option data-path=".catania" value="catania">Catania</option>
						<option data-path=".chievo" value="chievo">Chievo</option>
						<option data-path=".fiorentina" value="fiorentina">Fiorentina</option>
						<option data-path=".genoa" value="genoa">Genoa</option>
						<option data-path=".verona" value="verona">Hella Verona</option>
						<option data-path=".inter" value="inter">Inter</option>
						<option data-path=".juventus" value="juventus">Juventus</option>
						<option data-path=".lazio" value="lazio">Lazio</option>
						<option data-path=".livorno" value="livorno">Livorno</option>
						<option data-path=".milan" value="milan">Milan</option>
						<option data-path=".napoli" value="napoli">Napoli</option>
						<option data-path=".parma" value="parma">Parma</option>
						<option data-path=".roma" value="roma">Roma</option>				
						<option data-path=".sampdoria" value="sampdoria">Sampdoria</option>
						<option data-path=".sassuolo" value="sassuolo">Sassuolo</option>
						<option data-path=".torino" value="torino">Torino</option>				
						<option data-path=".udinese" value="udinese">Udinese</option>
					</select>
				</div>

				<div id="filterRuolo" class="jplist-group">

				   <input 
				      data-control-type="radio-buttons-filters"
				      data-control-action="filter"
				      data-control-name="Tutti" 
				      data-path="default" 				      
				      id="default-radio" 
				      type="radio" 
				      name="jplist"
				      checked="checked"
				   /> 
   					<label id="ruolo" class="all active" for="default-radio">Tutti</label>

				   <input 									
				      data-control-type="radio-buttons-filters"
				      data-control-action="filter"
				      data-control-name="P" 
				      data-path="#P" 			      
				      id="portiere" 
				      type="radio" 
				      name="jplist"
				   /> 
				   <label id="ruolo" class="portiere" for="portiere">P</label>

				   <input 									
				      data-control-type="radio-buttons-filters"
				      data-control-action="filter"
				      data-control-name="D" 
				      data-path="#D"				      
				      id="difesa" 
				      type="radio" 
				      name="jplist"
				   /> 
				   <label id="ruolo" class="difesa" for="difesa">D</label>

				   <input 									
				      data-control-type="radio-buttons-filters"
				      data-control-action="filter"
				      data-control-name="C" 
				      data-path="#C" 				      
				      id="centrocampo" 
				      type="radio" 
				      name="jplist"
				   /> 
				   <label id="ruolo" class="centrocampo" for="centrocampo">C</label>

				   <input 									
				      data-control-type="radio-buttons-filters"
				      data-control-action="filter"
				      data-control-name="A" 
				      data-path=".A" 			      
				      id="attacco" 
				      type="radio" 
				      name="jplist"
				   /> 
				   <label id="ruolo" class="attacco" for="attacco">A</label>
				</div>
			</div>

			<div id="button-cont">
					<button id="sort" class="sortRuolo">
						Ruolo
					</button>
					<button id="sort" class="sortTeam">
						Squadra
					</button>
					
					<button id="sort" class="sortName" >
						Nome
					</button>
					<button id="sort" class="sortValue">
						Valore
					</button>
					
					<button id="sort" class="aggiungi">
						Aggiungi
					</button>
			</div>

			<div id="sortingOptions">

			</div>
		</div>
			<div class="list">
							
					<ul id="lista" class="players">

						<?php
						$i = 0;
						$query="SELECT id_giocatore, ruolo, cognome, valore, squadra FROM giocatore ORDER BY squadra";
						$ris = mysql_query($query);

						while ($vet = mysql_fetch_array($ris)) {	
											
							echo "<div class='list-item playerDiv' id='p-add-$i' value='$vet[id_giocatore]'>
									<li id='p-add-$i' class='player'>
										<span id='id_player' value='$vet[id_giocatore]' style='display:none;'>
											$vet[id_giocatore] 
										</span>
										<span class='$vet[squadra]' id='team' style='display:none;'>
											$vet[squadra]
										</span>
										<span class='ruolo $vet[ruolo]' id='$vet[ruolo]'>
											$vet[ruolo]
										</span>
										<span class='squadra'>
											<img width='18px' height='18px' src='../img/logo-squadra/$vet[squadra].png'></img>
										</span>
										<span class='nome'>
											$vet[cognome]
										</span>
										<span class='valore'>
											20
										</span>
										<span class='aggiungi'>
											<button type='submit' class='add' id='add-$i' >+</button>
										</span>					
									</li>
								</div>
								";				
							$i++;
						}			
						?>     
					</ul>
				
				
			</div>

			<div class="box jplist-no-results text-shadow align-center">
					<p>Nessun risultato</p>
			</div>

		</div>
		
</div>
		
</body>

</html>

