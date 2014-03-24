<?php
	include("../session.php");
	include("../connect_db.php");
	
	if($_POST['id']){
	$id = $_POST['id'];	
	$_SESSION['prova'] = $id;
	$query = "DELETE FROM notifica where id_notifica = '$id'";
	mysql_query($query);
	}
?>


