<?php
	include("../session.php");
	include("../connect_db.php");
	$id = $_POST['id'];
	if(isset($id)){
	$query = "DELETE FROM notifica where id_notifica = '$id'";
	mysql_query($query);
	}
?>


