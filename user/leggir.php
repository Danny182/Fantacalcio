
<?php

include "../connect_db.php";
echo'<div id="cont">';
echo'<div id="window">';
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$g_nascita=$_POST["nascita_giorno"];
$m_nascita=$_POST["nascita_mese"];
$a_nascita=$_POST["nascita_anno"];
$citta=$_POST["citta"];
$email=$_POST["email"];
$usern=$_POST["user"];
$password=$_POST["password"];
$domanda=$_POST["domanda"];
$risposta=$_POST["risposta"];
///metto la data di nascita in UNA variabile
$data_nascita=$a_nascita."-".$m_nascita."-".$g_nascita;
////////contollo stesso nome utente
$sql="SELECT user FROM utente WHERE user='$usern';";
$res = mysql_query($sql);
if (mysql_num_rows($res)==1)
	{echo "ATTENZIONE <br>Il nome utente e' già stato utilizzato";
	 echo '<meta http-equiv="Refresh" content="3; reg.html">';}
	 
else{
//inserisco i dati all'interno del db
	$sql="INSERT INTO utente (nome,cognome,email,data_nascita,citta,user,password,domanda,risposta) VALUES ('$nome','$cognome','$email','$data_nascita','$citta','$usern','$password','$domanda','$risposta');";
	$res = mysql_query($sql);
	
	$query = "SELECT id_utente FROM utente WHERE nome = '$nome'";
	$ris = mysql_query($query);
	$vet = mysql_fetch_array($ris);
	$id_user = $vet['id_utente'];
    $nome_squadra = ''.$usern.' Team';
	//creo una squadra standard per l'utente
    $query = "INSERT INTO squadra VALUES(NULL, '$nome_squadra', NULL, '$id_user', '1', '0', false, NULL, '../img/logo-squadra/fiorentina.png', NULL )";
    $ris = mysql_query($query);
    if($ris){
	echo "Si e' registrato correttamente <br>";
	echo'<meta http-equiv="Refresh" content="3; ../index.php">';}
    else{
        echo "ATTENZIONE <br> Si è verificato un problema";
        echo'<meta http-equiv="Refresh" content="3; reg.html">';}
    }
	
mysql_close($conn);


echo'</div></div>';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../stili/style-leggir.css" type="text/css" media="screen" />
</head>
</html>