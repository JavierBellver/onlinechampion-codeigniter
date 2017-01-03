<table border="1" width="100%">
    <tr>
		<th>ID</th>
		<th>Login</th>
		<th>Password</th>
		<th>Email</th>
		<th>Actions</th>
    </tr>
	<?php foreach($usuario as $u){ ?>
    <tr>
		<td><?php echo $u['id']; ?></td>
		<td><?php echo $u['login']; ?></td>
		<td><?php echo $u['password']; ?></td>
		<td><?php echo $u['email']; ?></td>
		<td>
            <a href="<?php echo site_url('usuario/edit/'.$u['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('usuario/remove/'.$u['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>