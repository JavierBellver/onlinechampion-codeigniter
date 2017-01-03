<?php echo validation_errors(); ?>

<?php echo form_open('ranking/add'); ?>

	<div>NumRanking : <input type="text" name="numRanking" value="<?php echo $this->input->post('numRanking'); ?>" /></div>
	<div>Puntos : <input type="text" name="puntos" value="<?php echo $this->input->post('puntos'); ?>" /></div>
	<div>Jugadas : <input type="text" name="jugadas" value="<?php echo $this->input->post('jugadas'); ?>" /></div>
	<div>Ganadas : <input type="text" name="ganadas" value="<?php echo $this->input->post('ganadas'); ?>" /></div>
	<div>
				Juego : 
				<select name="juego">
					<option value="">select juego</option>
					<?php 
					foreach($all_juego as $juego)
					{
						$selected = ($juego['id'] == $this->input->post('juego')) ? ' selected="selected"' : null;

						echo '<option value="'.$juego['id'].'" '.$selected.'>'.$juego['id'].'</option>';
					} 
					?>
				</select>
		</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>