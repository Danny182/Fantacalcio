

				
				<input type = "hidden" name = "id_camp" value = "<?php echo $id_camp; ?>" />

				<?php foreach($regole as $value) $portieri = $value['n_portieri']?>
				<div id = "cont-label-modifica" class = "mod_nome">
					<label for="nome" class = "crea-camp-title">Numero Portieri in rosa:</label>
						<input type = "text" name = "n_por" id = "n_por" class="modifica-regole-n_part" value = "<?php echo $portieri; ?>" />
				</div>
					
				<?php foreach($regole as $value) $difensori = $value['n_difensori']?>
				<div id = "cont-label-modifica" class = "mod_n_part">
					<label for="nome" class = "crea-camp-title">Numero Difensori in rosa:</label>
						<input type = "text" name = "n_dif" id = "n_dif" class="modifica-regole-n_part" value = "<?php echo $difensori; ?>" />
				</div>

				<?php foreach($regole as $value) $centrocampisti = $value['n_centrocampisti']?>
				<div id = "cont-label-modifica"  class = "mod_formazione_automatica">
					<label for="nome" class = "crea-camp-title"> Numero Centrocamp. in rosa:</label>	
						<input type = "text" name = "n_cen" id = "n_cen" class="modifica-regole-n_part" value = "<?php echo $centrocampisti; ?>" />
				</div>

				<?php foreach($regole as $value) $attaccanti = $value['n_attaccanti']?>
				<div id = "cont-label-modifica" class = "mod_penalita">
					<label for="nome" class = "crea-camp-title"> Numero Attaccanti in rosa:</label>	
						<input type = "text" name = "n_att" id = "n_att" class="modifica-regole-n_part" value = "<?php echo $attaccanti; ?>" />
				</div>

				<?php foreach($regole as $value) $crediti = $value['crediti']?>
				<div id = "cont-label-modifica"  class = "mod_difesa_gazzetta">
					<label for="nome" class = "crea-camp-title"> Crediti Iniziali:<br></label>	
						<input type = "text" name = "crediti" id = "crediti" class="modifica-regole-n_part" value = "<?php echo $crediti; ?>" />
				</div>

				<div id = "cont-label-modifica"  class = "mod_portiere">
					<label for="nome" class = "crea-camp-title"> Nascondere le rose?<br></label>	
					<div id = "labels">
						<?php foreach($regole as $value) $nascondi_rosa = $value['nascondi_rosa'];
						if($nascondi_rosa){
							echo'
							<input type="radio" value="si" name="nascondi_rose" id="radio9" checked = "checked" />
							<label for="radio9" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="nascondi_rose" id="radio10"/>
							<label for="radio10" class = "crea-camp">No</label>';
						}

						else{
							echo'
							<input type="radio" value="si" name="nascondi_rose" id="radio9" />
							<label for="radio9" class = "crea-camp" >Si</label>
							<input type="radio" value="no" name="nascondi_rose" id="radio10" checked = "checked"/>
							<label for="radio10" class = "crea-camp">No</label>';

						}
						?>
						
					</div>

				
			