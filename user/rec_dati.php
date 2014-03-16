<?php

include("../connect_db.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recupero Dati</title>

<link rel="stylesheet" href="../stili/style-rec-dati.css" type="text/css" media="screen" />

</head>

<?php

$destinatario = trim($_GET['email']);

$query = "SELECT id_utente FROM utente WHERE email ='$destinatario'";

$ris = mysql_query($query);
if($ris)$var = 1;
else $var = 0;
$vet = mysql_num_rows($ris);

if(empty($vet)) {
	echo'<div id = "cont"> <div id = "window"> ATTENZIONE </b>  <br>
												Nessun utente è registrato con quella E-mail
			<meta http-equiv="Refresh" content="3; URL=ctrl_login.php?recupera=1&&usern=null&&password=null"></div></div>';
			die;
}
else{
	//metto in sessioe l'id utente
	$_SESSION['id'] = $vet['id_utente'];
	$query = "SELECT domanda, user FROM utente WHERE email='$destinatario'";
	$ris = mysql_query($query);
	$vet1 = mysql_fetch_array($ris);
	$domanda = $vet1['domanda'];
	$user = $vet1['user'];
	
}
			
			?>

<body>
<div id = "cont">
	<div id="top">
    	
        <div id="top-insize">
       		<div id="top-logo">
        			<a href="index.php"><img src="../img/2.png" width="80" height="80" /></a>
       		 </div>
        </div>
        
    </div>
        
        <div id = "center">
        
        	<div id = "title">
            	Assistenza-Recupero Dati
            </div>
            
            <div id = "desc">
            Benvenuto, da qui potrai avere tutte le informazioni necessarie per recuperare i dati.
            Devi semplicemente rispondere alla domanda segreta, inserita durante la registrazione.<br /><br />
            Domanda Segreta<br />
			<?php  echo "<b>$domanda</b>"; ?> <br /><br />
            <form action = "ctrl_risp.php" method = "POST">
            
			Risposta<br />
            <input type = "text" name = "risp"  size = "20"/><br /><br /><br />
            		  <input type = "hidden" name = "user" value ="<?php echo $user;?>"  />
                      <input type ="hidden" name = "dest" value = "<?php echo $destinatario;?>" />
                     
            		  <input type = "submit" name = "invia" value = "Rispondi" class = "reg"/>
                      
                      </form>
					 
            </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </div>
        
        
        
        
        
        
        
        
        
        
</body>
</html>
