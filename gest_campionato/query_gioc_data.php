<?php
include("../session.php");
include("../connect_db.php");

if($_GET['id_gioc']){
$id_gioc = $_GET['id_gioc'];
echo $id_gioc; 
$query = "UPDATE giocatore SET giocatore.n_maglia = 10 WHERE giocatore.id_giocatore = '$id_gioc'";
mysql_query($query);
}

/*$query = "SELECT statisitca.gol, statisitca.assist, statisitca.ammonito, statisitca.espulso, statisitca.presenza, statisitca.rig_sbagliato
, statisitca.autogol, statisitca.gol_subito, statisitca.gol_su_rigore, statisitca.rigore_parato FROM statistica";
$ris = mysql_query($query);
$json = array();
while($row = mysql_fetch_array($ris)){
	array_push($json, array('gol' => $row['gol']),
			                'assist' => $row['assist'], 
			                'ammonizioni' => $row['ammonito'], 
			                'esplusione' => $row['espulso'], 
			                'presenze' => $row['presenza'], 
			                'rig_sbagliati' => $row['rig_sbagliato'],
			                'autogol' => $row['autogol'], 
			                'gol_subiti' => $row['gol_subito'], 
			                'gol_su_rigore' => $row['gol_su_rigore'], 
			                'rigore_paratp' => $roe['rigore_parato']));
}
echo json_encode(array("json" => $json));*/

?>