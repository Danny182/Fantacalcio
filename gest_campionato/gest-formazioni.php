
<input type = "hidden" name = "id_camp" value = "<?php echo $id_camp; ?>" />

<?php foreach($regole as $value) $portieri = $value['n_por_panc']?>
<div id = "cont-label-modifica" class = "mod_nome">
	<label for="nome" class = "crea-camp-title">Numero Portieri in panchina:</label>
		<input type = "text" name = "por_panc" id = "por_panc" class="modifica-regole-n_part" value = "<?php echo $portieri; ?>" />
</div>

<?php foreach($regole as $value) $difensori = $value['n_dif_panc']?>
<div id = "cont-label-modifica" class = "mod_n_part">
	<label for="nome" class = "crea-camp-title">Numero Difensori in panchina:</label>
		<input type = "text" name = "dif_panc" id = "dif_panc" class="modifica-regole-n_part" value = "<?php echo $difensori; ?>" />
</div>

<?php foreach($regole as $value) $centrocampisti = $value['n_cen_panc']?>
<div id = "cont-label-modifica"  class = "mod_formazione_automatica">
	<label for="nome" class = "crea-camp-title"> Numero Cen. in panchina:</label>	
		<input type = "text" name = "cen_panc" id = "cen_panc" class="modifica-regole-n_part" value = "<?php echo $centrocampisti; ?>" />
</div>

<?php foreach($regole as $value) $attaccanti = $value['n_att_panc']?>
<div id = "cont-label-modifica" class = "mod_penalita">
	<label for="nome" class = "crea-camp-title"> Numero Att. in panchina:</label>	
		<input type = "text" name = "att_panc" id = "att_panc" class="modifica-regole-n_part" value = "<?php echo $attaccanti; ?>" />
</div>

<?php foreach($regole as $value) $orario_inserimento = $value['orario_ins_form']?>
<div id = "cont-label-modifica"  class = "mod_difesa_gazzetta">
	<label for="nome" class = "crea-camp-title"> Limite inserimento formazione:<br></label>	
		<input type = "text" name = "ins_form" id = "ins_form" class="modifica-regole-n_part" value = "<?php echo $orario_inserimento; ?>" />
		<i style="color:grey;"> Min. </i>
</div>

<?php foreach($regole as $value) $panchinari = $value['n_panchinari']?>
<div id = "cont-label-modifica"  class = "mod_portiere">
	<label for="nome" class = "crea-camp-title"> Numero panchinari:<br></label>
		<input type = "text" name = "panchinari" id = "panchinari" class="modifica-regole-n_part" value = "<?php echo $panchinari; ?>" />
</div>


















