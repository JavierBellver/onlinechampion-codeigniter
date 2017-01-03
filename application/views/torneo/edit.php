<?php echo validation_errors(); ?>

<?php echo form_open('torneo/edit/'.$torneo['id']); ?>

	<div>Numjugadores : <input type="text" name="numjugadores" value="<?php echo ($this->input->post('numjugadores') ? $this->input->post('numjugadores') : $torneo['numjugadores']); ?>" /></div>
	<div>Numtemporadas : <input type="text" name="numtemporadas" value="<?php echo ($this->input->post('numtemporadas') ? $this->input->post('numtemporadas') : $torneo['numtemporadas']); ?>" /></div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>