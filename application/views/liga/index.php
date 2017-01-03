<table border="1" width="100%">
    <tr>
		<th>ID</th>
		<th>Numjugadores</th>
		<th>Numplazasdisp</th>
		<th>Numtemporadas</th>
		<th>Actions</th>
    </tr>
	<?php foreach($liga as $l){ ?>
    <tr>
		<td><?php echo $l['id']; ?></td>
		<td><?php echo $l['numjugadores']; ?></td>
		<td><?php echo $l['numplazasdisp']; ?></td>
		<td><?php echo $l['numtemporadas']; ?></td>
		<td>
            <a href="<?php echo site_url('liga/edit/'.$l['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('liga/remove/'.$l['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>