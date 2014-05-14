<?php
	
	include("connect_db.php");
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salvataggio statistiche</title>
<link rel="stylesheet" href="stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="stili/campo-calcio.css" type="text/css" media="screen" />
<script src="librerie/jquery-1.11.0.min.js"/></script> 

<script type="text/javascript" src="script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="stili/menu2.css" />

<?php 

//regole file txt:  Cod.,Ruolo,Nome,VF,Gol Fatto,Gol Subito,Rigore Parato,Rigore Sbagliato,Rigore Segnato,Autorete,Ammonizione,Espulsione,Assist,Assist Fermo,Gdv,Gdp

$file = "voti.txt";
$ultima_riga = "WWW.FANTAGAZZETTA.COM,,,,,,,,,,,,,,,";
$confronto = "Cod.";
if(!file_exists($file)){
	echo "File inesistente!";
	die;
}

$fpunt = fopen($file, 'r');

$var = 0; //variabile di controllo

$array_dati = file($file);
//a che giornata siamo?
$array = $array_dati['0'];
$array_giornata = explode(' ', $array);
$gio = $array_giornata['1'];
$ascii = preg_replace('/[^(\x20-\x7F)]*/', '', $gio);//per togliere il carattere ¡
$giornata = trim($ascii);
$anno = 2014;


$lenght = count($array_dati);//conto gli elementi dell'array
$stringa = $array_dati['4'];//mi posizione alla quarta riga
$i = 5; //indice delle righe del file

$explode_riga = explode(',', $stringa);




while($i != $lenght){
	$explode_riga = explode(',', $stringa);
	$num = count($explode_riga);
	
	if(is_numeric($explode_riga['0'])){ //se la variabile  il codice salvo i dati
		$cognome = $explode_riga['2'];
		
		if(strcmp($explode_riga['3'], '6*') == 0 || $explode_riga['3'] == 6 || $explode_riga['3'] == 5){ //problema con i voti TOFIX
			$str = preg_replace('/[^(\x20-\x7F)]*/', '', $explode_riga['3']); //toglie i caratteri speciali
			$voto = trim($str);
			$gol_fatto = $explode_riga['4'];
			$gol_subito = $explode_riga['5'];
			$rigore_parato = $explode_riga['6'];
			$rigore_sbagliato = $explode_riga['7'];
			$rigore_segnato = $explode_riga['8'];
			$autogol = $explode_riga['9'];
			$ammonizione = $explode_riga['10'];
			$espulsione = $explode_riga['11'];
			$assist = $explode_riga['12'];
			$gol_vittoria = $explode_riga['14'];
			$gol_pareggio = $explode_riga['15'];
			
		}
		else{ //se il voto  con la virgola shifta l'array di una posizione (cambiano solo gli indici)
		$string = str_replace('"', ' ', $explode_riga['3']);
		$voto = trim($string);
		
		$gol_fatto = $explode_riga['5'];
		$gol_subito = $explode_riga['6'];
		$rigore_parato = $explode_riga['7'];
		$rigore_sbagliato = $explode_riga['8'];
		$rigore_segnato = $explode_riga['9'];
		$autogol = $explode_riga['10'];
		$ammonizione = $explode_riga['11'];
		$espulsione = $explode_riga['12'];
		$assist = $explode_riga['13'];
		$gol_vittoria = $explode_riga['15'];
		$gol_pareggio = $explode_riga['16'];
		}
		
		//prendo l'id del giocatore corrente
		$query = "SELECT giocatore.id_giocatore FROM giocatore WHERE giocatore.cognome = '$cognome'";
		$ris = mysql_query($query);
		if(!$ris){
				echo "C'e' stato qualche problema con l'id del giocatore => $cognome";
				die;
		}
		$row = mysql_fetch_array($ris);
		$id = $row['id_giocatore'];
		
		//inserisco le statistiche
		//(id_statistica, id_giocatore, anno, giornata, gol, assist, ammonito, espulso, presenza, voto, rigore_sbagliato, autogol, gol_subito, gol_pareggio, gol_vittoria, gol_su_rigore, regore_parato)
		$query = "INSERT INTO statistica VALUES (NULL, '$id', '$anno', '$giornata', '$gol_fatto', '$assist', '$ammonizione', '$espulsione', '1', '$voto', '$rigore_sbagliato', '$autogol', '$gol_subito', '$gol_pareggio', '$gol_vittoria', '$rigore_segnato', '$rigore_parato');";
		$ris = mysql_query($query);
		if(!$ris){
				echo "Problema con il salvataggio delle statistiche";
				die;
		}
		echo "Inserita statistica di => $cognome lunghezza vettore => $num <br>";
		
		
		}
	
	$stringa = $array_dati[$i];
	$i++;
}





	


	








fclose($fpunt);





?>