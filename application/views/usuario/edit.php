<?php echo validation_errors(); ?>

<?php echo form_open('usuario/edit/'.$usuario['id']); ?>

	<div>Login : <input type="text" name="login" value="<?php echo ($this->input->post('login') ? $this->input->post('login') : $usuario['login']); ?>" /></div>
	<div>Password : <input type="password" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $usuario['password']); ?>" /></div>
	<div>Email : <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $usuario['email']); ?>" /></div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>