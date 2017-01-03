<?php echo validation_errors(); ?>

<?php echo form_open('liga/edit/'.$liga['id']); ?>

	<div>Numjugadores : <input type="text" name="numjugadores" value="<?php echo ($this->input->post('numjugadores') ? $this->input->post('numjugadores') : $liga['numjugadores']); ?>" /></div>
	<div>Numplazasdisp : <input type="text" name="numplazasdisp" value="<?php echo ($this->input->post('numplazasdisp') ? $this->input->post('numplazasdisp') : $liga['numplazasdisp']); ?>" /></div>
	<div>Numtemporadas : <input type="text" name="numtemporadas" value="<?php echo ($this->input->post('numtemporadas') ? $this->input->post('numtemporadas') : $liga['numtemporadas']); ?>" /></div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>