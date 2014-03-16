<?php	
		$dbhost = "localhost";
		$dbname = "fantacalcio";
		$dbuser = "root";
		$dbpass = "";
		mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname);
		//include("../connect_db.php");
		$username = $_GET['user'];		
		$query = "SELECT id_utente FROM utente where user =  '$username' ";
		$ris = mysql_query($query);
		$vet = mysql_fetch_array($ris);

		if($vet['id_utente']>0){
			
			$results= false;
		}else{

			$results= true;
		}
		

		echo json_encode($results);
?>	
