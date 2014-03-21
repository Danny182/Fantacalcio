<?php
include("../session.php");
include("../connect_db.php");
//prendo nome e cognome dell'utente
$id_user = $_SESSION['id_utente'];
$query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente='$id_user'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);
$user = ucfirst($vet['nome'])." ".ucfirst($vet['cognome']);





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crea Il Campionato</title>
<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />

</head>

<body>

	<div id = "cont">
	<div id="top">
    	<div id="top-logo">
       	  <a href="../index.html"><img src="../img/2.png" width="80" height="80" /></a>
        </div>
        <?php
			echo'<div id = "nome">'.$user.'</div>';
			echo'<div id = "contatti"> FantaPV@gmail.com </div>';
		?>
        
    </div>
    <div id="top-border"></div>
    
    	<div id = "windows"><!--fine news--><!--fine news-->
        <div id="wind1">
     	<font size="+1">AREA CREAZIONE CAMPIONATO</font><br />
    	 Compila i campi sottostanti, &egrave; facile e veloce, crea il tuo campionato!
   		 </div>
         
         	 <form action = "salva_camp.php" method = "post" id = "form">
         	   <input type = "submit" value = "Salva!" class = "reg-campionato" />
             	
                <div id = "cont-label" class = "nome">
       			    <label for="nome">Nome Del Campionato</label>
					<br /><input type = "text" name = "nome" id = "nome" size = "20" />
                    
                    </div><!--fine cont-label -->
                    
                <div id = "cont-label" class = "cognome">
       			    <label for="nome">Nome Dell'Admin</label>
					<br /><input type = "text" name = "admin" id = "admin" size = "20" />
                    
                    </div><!--fine cont-label -->
                    
                    <div id = "cont-label" class = "password">
       			    <label for="nome">Password del campionato</label>
					<br /><input type = "password" name = "password" id = "password" size = "20" />
                    </div>
                    
                    <div id = "cont-label" class = "num">
       			    <label for="nome">Numero dei partecipanti</label>
					<br /><input type = "testo" name = "n_part" id = "num" size = "10" />
                    
                    </div><!--fine cont-label -->
         	 </form>
                    
                    
                    
                   </div>
        
        
</div><!--fine windows-->
</div><!-- fine con-->
                    
                




























</body>
</html>
