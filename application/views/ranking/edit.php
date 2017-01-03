<?php echo validation_errors(); ?>

<?php echo form_open('ranking/edit/'.$ranking['id']); ?>

	<div>NumRanking : <input type="text" name="numRanking" value="<?php echo ($this->input->post('numRanking') ? $this->input->post('numRanking') : $ranking['numRanking']); ?>" /></div>
	<div>Puntos : <input type="text" name="puntos" value="<?php echo ($this->input->post('puntos') ? $this->input->post('puntos') : $ranking['puntos']); ?>" /></div>
	<div>Jugadas : <input type="text" name="jugadas" value="<?php echo ($this->input->post('jugadas') ? $this->input->post('jugadas') : $ranking['jugadas']); ?>" /></div>
	<div>Ganadas : <input type="text" name="ganadas" value="<?php echo ($this->input->post('ganadas') ? $this->input->post('ganadas') : $ranking['ganadas']); ?>" /></div>
	<div>Juego : <input type="text" name="juego" value="<?php echo ($this->input->post('juego') ? $this->input->post('juego') : $ranking['juego']); ?>" /></div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>