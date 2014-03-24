<?php
	include("session.php");
	include("connect_db.php");
	
	if($_GET['id']){
	$id = $_GET['id'];	
	$_SESSION['prova'] = $id;
	$query = "DELETE FROM notifica where id_notifica = '$id'";
	mysql_query($query);
	}
?>


