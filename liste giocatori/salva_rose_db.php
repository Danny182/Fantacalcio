<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php


	include("../connect_db.php");
	
	$rosa = "chievo.txt";
	$f = fopen($rosa, "r");
	
	//il file è salavato cosi:
	//NOME E COGNOME | DATA DI NASCITA | CITTà DI NASCITA | NAZIONALITà | RUOLO | PIEDE | VALORE | SCADENZA
	echo'I DATI DEI GIOCATORI DEL CHIEVO<br><br>';
	//while(!feof($f)){
		
		$giocatore = fgets($f, 4096);
		$dato = explode("|", $giocatore);
		//Metto le prime lettere del nome e del cognome maiuscole
		$nome_grandi = strtolower($dato[0]);
		$nome = explode(" ", $nome_grandi);
		$num = count($nome);
		for($i = 0; $i < $num; $i++)
		$nome[$i] = ucfirst($nome[$i]);
		
		
		
		$nome_gioc = implode(" ", $nome);
		
		//adesso ho il nome ed il cognome nel formato giusto
		
		//metto tutte le altre stringhe con la prima lettere maiuscola
		for($i = 1; $i < 8; $i++)
		$inf[$i] = str_replace(' ', '', ucfirst(strtolower($dato[$i])));
		
		
		//i dati sono pronti per essere salvati nel db
		/*
		for($i = 1; $i < 8; $i++)
		echo"$inf[$i]<br>";
		*/
		
		
		
		
	fclose($f);
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>
<body>
</body>
</html>