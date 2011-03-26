<table>
	<tr>
		<th>id</th>
		<th>Vardas</th>
		<th>Epaštas</th>
		<th>Grupė</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $users as $user ): ?>
	<tr>
		<td><?php echo $user->id ?></td>
		<td><?php echo anchor('users/view/'.$user->id, $user->username ); ?></td>
		<td><?php echo $user->email ?></td>
		<td><?php echo anchor('groups/view/'.$user->group_id, $user->group_name ); ?></td>
		<td>
		<?php echo anchor('users/edit/'.$user->id, 'Keisti'); ?>
		<?php echo anchor('users/delete/'.$user->id, 'Trinti'); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>