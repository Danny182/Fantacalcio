<?php

if(!isset($_POST['n_por']) || !is_numeric($_POST['n_por']))
		$check = 1;
	else 
		$numero_portieri = $_POST['n_por'];

	if(!isset($_POST['n_dif']) || !is_numeric($_POST['n_dif']))
		$check = 1;
	else 
		$numero_difensori = $_POST['n_dif'];

	if(!isset($_POST['n_cen']) || !is_numeric($_POST['n_cen']))
		$check = 1;
	else 
		$numero_cen = $_POST['n_cen'];

	if(!isset($_POST['n_att']) || !is_numeric($_POST['n_att']))
		$check = 1;
	else 
		$numero_attaccanti = $_POST['n_att'];

	if(!isset($_POST['crediti']) || !is_numeric($_POST['crediti']))
		$check = 1;
	else 
		$crediti = $_POST['crediti'];

	$nascondi_rose = $_POST['nascondi_rose'];

	?>