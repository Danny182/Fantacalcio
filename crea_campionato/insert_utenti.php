<?php
include("../session.php");
include("../connect_db.php");

//prendo nome e cognome dell'utente
$id_user = $_SESSION['id_utente'];
$query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente='$id_user'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);
$user = ucfirst($vet['nome'])." ".ucfirst($vet['cognome']);
$id_camp = $_GET['id_camp'];

//prendo il numero dei partecipanti
$n_part = $_SESSION['n_part'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserimento Giocatori</title>

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
    
	<div id = "windows3"><!--fine news--><!--fine news-->
<div id="wind1-3">
     	<font size="+1">AREA INSERIMENTO GIOCATORI</font><br />
    	 
         In questa area devi semplicemente inseri gli username dei tuoi che sono già 
         iscritti al sito. Nel caso non lo fossero allora inserisci un'E-mail valida.<br />
         Al resto pensiamo noi!
         
         
   		 </div>
         
   		<?php
		echo'<form action = "invita_utenti.php" method = "post" id = "form">';
		echo'<input type = "hidden" name = "id" value = "'.$id_camp.'" />';
		$i = 1;
		while($i <= $n_part){
		
			echo'<li><div id = "cont-giocatore" class = "left"> 
					 <label for="nome">Giocatore n° '.$i.'</label><br>
					 <input type = "text" name = "giocatore'.$i.'" id = "admin" size = "20" /> </div></li>';
			$i++;
			if($i == 6) break;	 
					 
		}
		
		for($i; $i <= $n_part; $i++){
			echo'<li><div id = "cont-giocatore" class = "right"> 
					 <label for="nome">Giocatore n° '.$i.'</label><br>
					 <input type = "text" name = "giocatore'.$i.'" id = "admin" size = "20" /> </div></li>';
		}
		
	echo'<input type = "submit" value = "Invita gli amici!" class = "reg-campionato2" />';	
	   echo'</form>';
	   ?>
         
         
         
         
         
</div>

<div id = "inf2">*Non occorre inserire anche il tuo username </div>
      
	
                    
  
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
</body>
</html>