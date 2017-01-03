<?php echo validation_errors(); ?>

<?php echo form_open('juego/edit/'.$juego['id']); ?>

	<div>Nombre : <input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $juego['nombre']); ?>" /></div>
	<div>Descripcion : <textarea name="descripcion"><?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $juego['descripcion']); ?></textarea></div>
	<div>Categoria : <input type="text" name="categoria" value="<?php echo ($this->input->post('categoria') ? $this->input->post('categoria') : $juego['categoria']); ?>" /></div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>