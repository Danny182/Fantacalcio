<?php
	include("../session.php");
	include("../connect_db.php");
    $id = $_GET['id'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Le Tue Notifiche</title>
<link rel="stylesheet" href="../stili/style-notifiche.css" type="text/css" media="screen" />

</head>

<?php
    
    $query = "DELETE FROM notifica WHERE id_utente = '$id'";
    $ris = mysql_query($query);
    if(!$ris){
        echo ' <div id = "cont-errore"><div id = "errore"> ATTENZIONE <br>Si è verificato un problema
        <meta http-equiv="Refresh" content="3; URL=../notifiche.php"> </div></div>' ;
        }
    else{
        echo ' <div id = "cont-errore"><div id = "errore"> Notifiche cancellate 
        <meta http-equiv="Refresh" content="3; URL=../notifiche.php"> </div></div>' ;
        
    }
    
    
?>

<html>
<body>
</html>
</bdoy>
