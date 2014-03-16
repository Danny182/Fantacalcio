

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="stili/style-index.css" type="text/css" media="screen" />
<script src="librerie/jquery-1.9.1.min.js"/></script>
<script src="librerie/jquery-ui-1.10.3.custom.min.js"></script>
<script src="script/wind1-3.js"></script>
<script type = "text/javascript" src = "librerie/jquery.innerfade.js"> </script>
<script type = "text/javascript" src = "librerie/jquery.validate.min.js"> </script>
<title>Fantacalcio.it</title>
</head>
<?php
session_start(); 
if ($_SESSION['login_ok']) 
	{$logok=true;
	$user=$_SESSION['user'];
	$id_user = $_SESSION['id_utente'];}
	else
	$logok=false;
	include("connect_db.php");
	
	
?>
<body>

<div id = "cont">
	<div id="top">    	
        <div id="top-insize">
        	<div id="top-logo">
				<a href="index.php"><img src="img/4.png" width="100px" height="75px" /></a>
			</div>
			<div id="top-user">
				<font >
					<?php
					if (@$_SESSION["login_ok"]==true)
						{echo "$user";
						echo' <a href="user/log-out.php">Log Out</a>';}
					else
					
					?>
				</font>
			</div>
        </div>
    </div>
		
	
	

	<!--gerarchia a finestre: a partire da sinistra, wind1, wind2, wind3. Al loro interno ulteriormente suddivise.-->
	<div id = "windows">	
		
		<div id = "wind1">
			<div id = "wind1-1">
				<img src = "img/4.png" height="100%" width="100%"/>
			</div> 
			<div id = "wind1-2">
				<span>CREA IL TUO MODULO!</font><BR /><br>Metti in campo la tua squadra, per creare il miglior modulo per vincere</span>
				<span>CREA I TUOI CAMPIONATI</font><br /><br>Crea e gestisci i tuoi campoionati, invita quanti amici vuoi a registrarsi al sito e il gioco comincia!</span>
				<span>GIOCA ORA!</font><br /><br>Gioca con i tuoi amici per una sfida che dura tutto l anno, vediamo chi è il più forte!</span>
				<span>CONTI AUTOMATICI</font><br /><br>I conti verrano fatti automaticamente ogni settimana, dai solo la formazione!</span>
			</div>
		</div><!--fine div wind1-->
		
		<div id = "wind2">
		<?php
            if ($logok==false)
			{echo'<p align="center"><font size="+3" color="#000F">Benvenuto!</font></p>
			<div id = "login">        
				<br />
				<form action = "user/ctrl_login.php" method = "GET" align = "center">
					
					<input type="text" value="User Name" name="usern" class="user" onclick="this.value=';echo"''";echo';" onblur  = "if(this.value == "") this.value = "User Name" " />
					
					<input type="password" name="password" class = "pass" value="Password" onclick="this.value=';echo"''";echo';"  onblur  = "if(this.value == "") this.value = "Password" " />
					<br /><br />
					
					<input  type = "submit" name = "invia" id = "accedi" class = "button" value = "Accedi"  />
					<br>
					<br><input type = "submit" name = "recupera" class = "button" id="persi" value = "Dati persi?"  />
				</form>
				
            </div>
                
            <div id ="noreg">    
			<p  align="center"><i>Se non sei registrato</i></p>
			<form action = "user/reg.html">
				<input type = "submit" value = "Iscriviti!" class = "reg">
			</form>
			</div>
			';}
		else{
			echo'<p <font align="center" size="+1" color="#000F">Benvenuto!<br></font><font size="+1" color="#ededf0">'.$user.'</font></p>
			<div id="login">
				<form action="home.php" align="center">
					<a href = "home.php"><input type = "button" name = "invia" class = "button" value = "Entra" id = "entra" /></a>
				</form>
			</div>
			
			';}
		?>
		</div>
			
		<div id = "wind3">
			<div id = "wind3-1"><!--a partire dall alto della terza finestra-->
				STAI IN AGGIORNAMENTO!</font><p>
				Segui le notizie sportive dei maggiori quotidiani sportivi ed esteri, Clicca qui! </p>
			</div>
			<div id = "wind3-2">
				LEGGI LE REGOLE</font><p>
				Prima di provare leggi le regole del fantacalcio, oppure controlla ogni tuo dubbio cliccando qui!</p>
			</div>
			<div id = "wind3-3">
				RIMANI AGGIORNATO SULLA CLASSIFICA DELLA SERIA A
			</div>
			<div id = "wind3-4">
				CALENDARIO E INFORMAZIONI SU I GIOCATORI
			</div>
		</div>
	</div>
</div>

</body>
</html>