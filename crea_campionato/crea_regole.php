<?php
include("../session.php");
include("../connect_db.php");
$nome_camp = $_GET['nome'];
$query = "SELECT id_campionato FROM campionato WHERE nome = '$nome_camp'";
$ris = mysql_query($query);
if(!$query) {
	echo '<div id = "cont-error"> <div id = "window"> Mysql error()													
		<meta http-equiv="Refresh" content="3; URL=crea_regole.php?nome='.$nome.'">';
}
$vet = mysql_fetch_array($ris);
$id_camp = $vet['id_campionato'];
//prendo nome e cognome dell'utente
$id_user = $_SESSION['id_utente'];
$query = "SELECT utente.nome, utente.cognome FROM utente WHERE utente.id_utente='$id_user'";
$ris = mysql_query($query);
$vet = mysql_fetch_array($ris);
$user = ucfirst($vet['nome'])." ".ucfirst($vet['cognome']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crea Regole</title>
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
    
    	<div id = "windows2"><!--fine news--><!--fine news-->
        <div id="wind1-2">
     	<font size="+1">AREA CREAZIONE REGOLE</font><br />
    	 Crea le tue regole personalizzate, hai quasi finito la creazione del tuo campionato!
   		 </div>
         
         <form action = "salva_regole.php" method = "post" id = "form">
         
       <?php	echo'<input type = "hidden" name = "id" value = "'.$id_camp.'" />'; ?>
          
             	
                <div id = "cont-label"  class = "rigore_pa">
       			    <label for="nome"> Rigore Parato:</label>
					+1 <input type="radio" name="rigore_pa" value="1" checked="checked"/>
                    +2 <input type="radio" name="rigore_pa" value="2"/>
                    +3 <input type="radio" name="rigore_pa" value="3"/>
                    </div><!--fine cont-label -->
                    
                <div id = "cont-label" class = "rigore_sb">
       			    <label for="nome">Penalità rigore sbalgliato:</label>
					-1 <input type="radio" name="rigore_sb" value="-1" checked="checked"/>
                    -2 <input type="radio" name="rigore_sb" value="-2"/>
                    -3 <input type="radio" name="rigore_sb" value="-3"/>
                    
                    </div><!--fine cont-label -->
                    
                    <div id = "cont-label" class = "autogol">
                   <label for="nome">Penalità Autogol:</label>
                   -1 
                   <input type="radio" name="autogol" value="-1"/>
-2
<input type="radio" name="autogol" value="-2"/>
                   -3 <input type="radio" name="autogol" value="-3" checked="checked"/>
                    </div><!--fine cont-label -->
                    
                    
                    <div id = "cont-label" class = "formazioni">
                 <label for="nome">Inserire le formazioni automaticamente?</label>
               	 Si<input type="radio" name="formazione" value="si"onclick="this.form.penalita.disabled=true;" />
              	 No <input type="radio" name="formazione" value="no"onclick="this.form.penalita.disabled=false;"/>
                 
                 
                 </div><!--fine cont-label -->
                 
                  <div id = "cont-label" class = "voti">
                  <label for="nome">Specificare il giornale da cui attingere i voti:</label>
                 Gazzetta Dello Sport<input type="radio" name="voti" value="gazzetta" checked="checked"/>
                <br /> Tutto Sport<input type="radio" name="voti" value="tuttosposrt"/>
                 <br />Il Corriere Dello Sport<input type="radio" name="voti" value="corriere"/>
                 
                 </div><!--fine cont-label -->
                 
                 <div id = "cont-label" class = "penalita">
                 <label for="nome">Penalità in caso di mancato inserimento:</label><br />
                 <input type = "text" name = "penalita" size = "3" id = "penalita" disabled="true" />
                 
                 </div><!--fine cont-label -->
                 
                 
                <input type = "submit" value = "Salva le Regole!" class = "reg2" />
                
                </form>
                 <div id = "inf">* Le regole potranno essere cambiate in qualsiasi momento dall'amministratore</div>  
                    
                    
                   </div>
        
        
</div><!--fine windows-->
</div><!-- fine con-->
         
         
</body>
</html>