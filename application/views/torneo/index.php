<table border="1" width="100%">
    <tr>
		<th>ID</th>
		<th>Numjugadores</th>
		<th>Numtemporadas</th>
		<th>Actions</th>
    </tr>
	<?php foreach($torneo as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
		<td><?php echo $t['numjugadores']; ?></td>
		<td><?php echo $t['numtemporadas']; ?></td>
		<td>
            <a href="<?php echo site_url('torneo/edit/'.$t['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('torneo/remove/'.$t['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>