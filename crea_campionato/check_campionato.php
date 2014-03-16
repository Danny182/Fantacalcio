<?php	
		$dbhost = "localhost";
		$dbname = "fantacalcio";
		$dbuser = "root";
		$dbpass = "";
		mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname);
		//include("../connect_db.php");
		$nomecamp = $_GET['nome'];		
		$query = "SELECT id_campionato FROM campionato where nome =  '$nomecamp' ";
		$ris = mysql_query($query);
		$vet = mysql_fetch_array($ris);

		if($vet['id_campionato']>0){
			
			$results= true;
		}else{

			$results= false;
		}
		

		echo json_encode($results);
?>	
