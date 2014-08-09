 <?php
    include("../session.php");
    include("../connect_db.php");
    include("../funzioni/function_user.php");
	//prendo l'id dell'admin
	$id=$_COOKIE['crea_camp']['id_admin'];
    //se si viene dalla pagina crea-regole.php    
	if($_COOKIE['crea_camp']['where']==1){
			
		//metto tutti username o email all'interno di una stringa
		$users='';
		for ($i=2; $i<=$_COOKIE['crea_camp']['mod_n_part'];$i++)
			$users=$_COOKIE['crea_camp']['utente'.$i.''].'£'.$users;			
		//copio i cookie all'interno a delle variabili (il db non consente le variabili come cookies)
		foreach ($_COOKIE['crea_camp'] as $key => $value)
			{ $$key=$value;}
		// modifico le variabile relative ai moduli consentiti	
		if (!(isset($mod_penalita)))
			$mod_penalita=0;
		if(isset($_COOKIE['crea_camp']['modulo_343']))
			$modulo_343="si";
		else
			$modulo_343="no";
		if(isset($_COOKIE['crea_camp']['modulo_352']))
			$modulo_352="si";
		else
			$modulo_352="no";
		if(isset($_COOKIE['crea_camp']['modulo_361']))
			$modulo_361="si";
		else
			$modulo_361="no";
		if(isset($_COOKIE['crea_camp']['modulo_433']))
			$modulo_433="si";
		else
			$modulo_433="no";
		if(isset($_COOKIE['crea_camp']['modulo_442']))
			$modulo_442="si";
		else
			$modulo_442=="no";
		if(isset($_COOKIE['crea_camp']['modulo_451']))
			$modulo_451="si";
		else
			$modulo_451="no";
		if(isset($_COOKIE['crea_camp']['modulo_253']))
			$modulo_253="si";
		else
			$modulo_253="no";
		if(isset($_COOKIE['crea_camp']['modulo_334']))
			$modulo_334="si";
		else
			$modulo_334="no";
		if(isset($_COOKIE['crea_camp']['modulo_424']))
			$modulo_424="si";
		else
			$modulo_424="no";
		if(isset($_COOKIE['crea_camp']['modulo_532']))
			$modulo_532="si";
		else
			$modulo_532="no";
		if(isset($_COOKIE['crea_camp']['modulo_541']))
			$modulo_541="si";
		else
			$modulo_541="no";
		if(isset($_COOKIE['crea_camp']['modulo_550']))
			$modulo_550="si";
		else
			$modulo_550="no";
			
		//eseguo l'inserimento nel db
		$query= "INSERT INTO campionato(nome, password, admin,id_admin, n_part, formazione_automatica, penalita, mod_difesa_gazzetta, mod_portiere, mod_difesa, mod_centrocampo, mod_attacco, mod_modulo, n_sostituzioni, bonus_gol_portiere, bonus_gol_difensore, bonus_gol_centrocampista, bonus_gol_attaccante, bonus_gol_rigore, bonus_rigore_parato, bonus_assist, bonus_portiere, bonus_casa, bonus_gol_vittoria, bonus_gol_pareggio, bonus_capitano, malus_gol_subito, ammonizione, espulsione, malus_rigore_sbagliato, malus_autogol, voto_giocatore_sv, voto_giocatore_ss, punti_primo_gol, punti_range_gol, modulo_343, modulo_352, modulo_361, modulo_433, modulo_442, modulo_451, modulo_253, modulo_334, modulo_424, modulo_532, modulo_541, modulo_550, partecipanti) VALUES ('$mod_nome', '$password', '$admin', '$id_admin', '$mod_n_part', '$mod_formazione_automatica', '$mod_penalita', '$mod_difesa_gazzetta', '$mod_portiere', '$mod_difesa', '$mod_centrocampo', '$mod_attacco', '$mod_modulo', '$num_sostituzioni', '$bonus_gol_portiere', '$bonus_gol_difensore', '$bonus_gol_centrocampista', '$bonus_gol_attaccante', '$bonus_gol_rigore', '$bonus_rigore_parato', '$bonus_assist', '$bonus_portiere', '$bonus_casa', '$bonus_gol_vittoria', '$bonus_gol_pareggio', '$bonus_capitano', '$malus_gol_subito', '$ammonizione', '$espulsione', '$malus_rigore_sbagliato', '$malus_autogol', '$voto_giocatore_sv', '$voto_giocatore_ss', '$punti_primo_gol', '$punti_range_gol', '$modulo_343', '$modulo_352', '$modulo_361', '$modulo_433', '$modulo_442', '$modulo_451', '$modulo_253', '$modulo_334', '$modulo_424', '$modulo_532', '$modulo_541', '$modulo_550', '$users')";
		$ris = mysql_query($query);
		
	}
	//fine where 1 (se si viene da modifica regole)
	//inizio where 0 (se si utilizza regole gazzetta)
	if($_COOKIE['crea_camp']['where']==0)
	{
		//metto tutti username o email all'interno di una stringa
		$users='';
		$penalita=0;
		for ($i=2; $i<=$_COOKIE['crea_camp']['n_part'];$i++)
			$users=$_COOKIE['crea_camp']['utente'.$i.''].'£'.$users;
			
		//copio i cookie all'interno a delle variabili (il db non consente le variabili come cookies)
		foreach ($_COOKIE['crea_camp'] as $key => $value)
			{ $$key = $value;
			}
		//eseguo l'inserimento nel db
		$query= "INSERT INTO campionato(nome, password, admin, id_admin, n_part, formazione_automatica, penalita, partecipanti) VALUES ('$nome', '$password', '$admin', '$id_admin', '$n_part', '$formazione_automatica', '$penalita', '$users')";
		$ris = mysql_query($query);
	}
	//aggiorno la tabella squadra, metto a che campionato è iscritta (id_campionato) e la segno come iscritta (1)
	//prima prendo l'id del campionato
	$query="SELECT id_campionato FROM campionato WHERE nome='$nome'";
	$ris=mysql_query($query);
	$vet = mysql_fetch_array($ris);
	$id_campionato = $vet['id_campionato'];
	//adesso aggiorno la tabella squadra
	$id_squadra=$_COOKIE['crea_camp']['id_squadra'];
	$query="UPDATE squadra SET id_campionato= '$id_campionato', iscritta='1' WHERE id_squadra='$id_squadra'";
	$ris=mysql_query($query);
	
	
	//invio le notifiche///////////////////////////////////////
	 
	$nome_camp=$_COOKIE['crea_camp']['nome'];
	$nome_admin=$_COOKIE['crea_camp']['admin'];
    $link = "crea_camp/iscrivi-squadra.php";
    //creo la notifica da inviare al giocatore
    $notifica = 'Sei stato invitato ad unirti al torneo '.$nome_camp.'  dall amministratore della lega <br>'.$nome_admin.'
    Per unirti ai tuoi amici basta cliccare nel link sotto e seguire le indicazioni, in pochi minuti il gioco è fatto!<br>
    Buon divertimento!<br>
    <a href = "crea_campionato/iscrivi-squadra.php?id_camp='.$id_campionato.'&&var=0">Iscrivi la tua squadra al campionato</a>';
        

    for($i = 2; $i <= $n_part; $i++){
        $utente = $_COOKIE['crea_camp']['utente'.$i.''];
        
        if(filter_var($utente, FILTER_VALIDATE_EMAIL))					
			{	//modulo per inviare la mail 
			}
		else
			{
			//modulo per mandare la notifica all'username			
			$id_utente = get_userid($utente);			
			$query = "INSERT INTO notifica VALUES('null', 'invito al campionato', '$notifica', 'false', '$id', '$id_utente')";
			$ris = mysql_query($query);
			}
    }
    
    //elimino i cookie
		foreach ($_COOKIE['crea_camp'] as $key => $value)
			{unset($_COOKIE['crea_camp']['$key']);
			setcookie("crea_camp[$key]", NULL, -1);}
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<title>Crea Il Campionato</title>
</head>
<body>

	<div id="cont-errore"><div id="errore">Creazione del campionato completata!
    <meta http-equiv="Refresh" content="3; URL=../home.php"></div></div>

</body>
</html>
