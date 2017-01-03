<?php echo validation_errors(); ?>

<?php echo form_open('juego/add'); ?>

	<div>Nombre : <input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" /></div>
	<div>Descripcion : <textarea name="descripcion"><?php echo $this->input->post('descripcion'); ?></textarea></div>
	<div>Categoria : <input type="text" name="categoria" value="<?php echo $this->input->post('categoria'); ?>" /></div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>