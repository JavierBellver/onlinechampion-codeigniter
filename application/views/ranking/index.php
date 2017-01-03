<table border="1" width="100%">
    <tr>
		<th>ID</th>
		<th>NumRanking</th>
		<th>Puntos</th>
		<th>Jugadas</th>
		<th>Ganadas</th>
		<th>Juego</th>
		<th>Actions</th>
    </tr>
	<?php foreach($ranking as $r){ ?>
    <tr>
		<td><?php echo $r['id']; ?></td>
		<td><?php echo $r['numRanking']; ?></td>
		<td><?php echo $r['puntos']; ?></td>
		<td><?php echo $r['jugadas']; ?></td>
		<td><?php echo $r['ganadas']; ?></td>
		<td><?php echo $r['juego']; ?></td>
		<td>
            <a href="<?php echo site_url('ranking/edit/'.$r['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('ranking/remove/'.$r['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>