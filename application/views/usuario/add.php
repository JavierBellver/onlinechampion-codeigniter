<?php echo validation_errors(); ?>

<?php echo form_open('usuario/add'); ?>

	<div>Login : <input type="text" name="login" value="<?php echo $this->input->post('login'); ?>" /></div>
	<div>Password : <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" /></div>
	<div>Email : <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" /></div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>