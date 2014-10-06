<?php
    include("../session.php");
    include("../connect_db.php");
    include("../funzioni/function_user.php");
    include("../funzioni/home_function.php");
    $n_part =$_COOKIE['crea_camp']['n_part'];    
    $id = $_SESSION['id_utente'];
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
    $nome_admin = $user;
    $nome_camp = get_leaguesdates($id_camp);
    
    //metto email o username all'interno dei cookie
    for($i = 2; $i <= ($n_part); $i++){
		$v['utente'.$i.''] = $_POST['utente'.$i.''];}
	foreach ($v as $key => $value)
			setcookie("crea_camp[$key]", $value, 0);
    
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />

<title>Crea Il Campionato</title>
</head>



	<div id = "cont-errore"> <div id = "errore"> Procedura eseguita con successo, Buon divertimento!
	<meta http-equiv="Refresh" content="3; URL=fine-camp.php">
  
    




<body>

</body>

</html>
    
  
