<table border="1" width="100%">
    <tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Categoria</th>
		<th>Actions</th>
    </tr>
	<?php foreach($juego as $j){ ?>
    <tr>
		<td><?php echo $j['id']; ?></td>
		<td><?php echo $j['nombre']; ?></td>
		<td><?php echo $j['descripcion']; ?></td>
		<td><?php echo $j['categoria']; ?></td>
		<td>
            <a href="<?php echo site_url('juego/edit/'.$j['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('juego/remove/'.$j['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>