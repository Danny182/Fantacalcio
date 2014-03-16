<?php
include("../session.php");
include("../connect_db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<title>Crea Il Campionato</title>
</head>
<?php
	$var = 0;
	$nome = $_POST['nome'];
	$admin = $_POST['admin'];
	$password = $_POST['password'];
	$n_part = $_POST['n_part'];
	$_SESSION['n_part'] = $n_part;
	
	//controllo che il nome del campionato non esiste già
	
	$query = "SELECT nome FROM campionato";
	$ris = mysql_query($query);
	
	while($vet = mysql_fetch_array($ris)){
		
				if(strcmp($vet['nome'], $nome) == 0) {
					echo '<div id = "cont-error"> <div id = "window"> ATTENZIONE <br> Il nome del campionato è già utilizzato
		<meta http-equiv="Refresh" content="3; URL=crea_campionato.php">';
					
												   
					die;
					}
			}
			
	//controllo che l'username dell'admin esista
	
	$query = "SELECT user FROM utente";
	$ris = mysql_query($query);
			while($vet = mysql_fetch_array($ris)){
			if(strcmp($vet['user'], $admin) == 0) {
				$var = 0;
				break;
			}
			else $var = 1;
		}
	
	
	
	if($var == 1){
		echo '<div id = "cont-error"> <div id = "window">ATTENZIONE <br> L Username dell Admin non esiste
		<meta http-equiv="Refresh" content="3; URL=crea_campionato.php">';
	}
		
	if($var == 0){
	$query = "INSERT INTO campionato VALUES('null', '$nome', '$admin', '0', '0', '$password', '0',  '0', '0', '0', '0', '0')";
	$ris = mysql_query($query);
	
	
		echo '<div id = "cont-error"> <div id = "window"> Creazione del campionato eseguita con successo.<br> Passa al punto 2													
		<meta http-equiv="Refresh" content="3; URL=crea_regole.php?nome='.$nome.'">';
					
		
	}
	
	?>
<body>












</body>
</html>