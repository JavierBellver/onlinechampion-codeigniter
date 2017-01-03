<?php echo validation_errors(); ?>

<?php echo form_open('liga/add'); ?>

	<div>Numjugadores : <input type="text" name="numjugadores" value="<?php echo $this->input->post('numjugadores'); ?>" /></div>
	<div>Numplazasdisp : <input type="text" name="numplazasdisp" value="<?php echo $this->input->post('numplazasdisp'); ?>" /></div>
	<div>Numtemporadas : <input type="text" name="numtemporadas" value="<?php echo $this->input->post('numtemporadas'); ?>" /></div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>