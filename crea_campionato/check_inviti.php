<?php	
		$dbhost = "localhost";
		$dbname = "fantacalcio";
		$dbuser = "root";
		$dbpass = "";
		mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname);
		//include("../connect_db.php");
		$results= true;
		foreach($_GET as $key => $value) 
			if (strpos($key, 'utente') === 0) 
				$username = $value;
		//controllo che lìusername inserito sia diverso da quello dell'admin
		if ($username!=$_COOKIE['crea_camp']['admin'])
		{
			$query = "SELECT id_utente FROM utente where user =  '$username' ";
			$ris = mysql_query($query);
			$vet = mysql_fetch_array($ris);			
			if($vet['id_utente']>0){			
				$results= true;
			}else{
				$results= false;
				//controlla se è stata inserita una email e controlla il suo formato se è valido
				if(filter_var($username, FILTER_VALIDATE_EMAIL))					
					$results= true;
				}
		}	
		else
			$results=false;
		echo json_encode($results);
?>	
