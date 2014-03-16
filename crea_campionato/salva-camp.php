<?php
    include("../session.php");
    include("../connect_db.php");
    include("../funzioni/function_user.php");
    //se si viene dalla pagina crea-regole.php
    if($_GET['where']==0){
		$nome = $_POST['nome'];
		$admin = $_COOKIE['crea_camp']['admin'];
		$password = $_POST['password'];
		$n_part = $_POST['n_part'];
		$squadra = $_POST['squadra'];
		
		setcookie("crea_camp[nome]", $nome, 0);
		setcookie("crea_camp[password]", $password, 0);
		setcookie("crea_camp[n_part]", $n_part, 0);
		setcookie("crea_camp[squadra]", $squadra, 0);
		
		//prendo l'ID della squadra e lo metto nei cookie
		$query="SELECT id_squadra FROM squadra WHERE nome = '$squadra'";
		$ris = mysql_query($query);
		$vet = mysql_fetch_array($ris);
		$id_squadra = $vet['id_squadra'];
		setcookie("crea_camp[id_squadra]", $id_squadra, 0);	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<title>Crea Il Campionato</title>
</head>
	<?php
		//controllo se alcuni dei campi erano vuoti
		if(empty($_POST['nome']) || empty($admin) || empty($_POST['password']) || $_POST['squadra'] == 'null' || empty($_POST['n_part']) ){
			echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> I dati inseriti non sono corretti
			<meta http-equiv="Refresh" content="3; URL=crea-campionato.php"> </div></div>' ;
			die;
		}
		
		//controllo che il nome del campionato non esiste già	
		$query = "SELECT nome FROM campionato";
		$ris = mysql_query($query);	
		while($vet = mysql_fetch_array($ris)){		
			if(strcmp($vet['nome'], $nome) == 0) {
				echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br> Il nome del campionato è già utilizzato
				<meta http-equiv="Refresh" content="3; URL=crea-campionato.php"> </div></div>' ;          
				die;
			}
		}
			
		echo '<div id = "cont-errore"> <div id = "errore">Creazione del campionato eseguita con successo<br>Vai al passaggio successivo!
		<meta http-equiv="Refresh" content="3; URL=crea-regole.php?nome='.$nome.'">';
	?>
<body>

</body>
</html>
