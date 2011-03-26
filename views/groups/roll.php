<table>
	<tr>
		<th>id</th>
		<th>Pavadinimas</th>
		<th>Tėvinė grupė</th>
		<th>Vartotojų skaičius</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $groups as $group ): ?>
	<tr>
		<td><?php echo $group->id ?></td>
		<td><?php echo anchor('groups/view/'.$group->id, $group->name ); ?></td>
		<td><?php echo $group->parent_group_name ?></td>
		<td><?php echo $group->number_of_users; ?></td>
		<td>
		<?php echo anchor('groups/edit/'.$group->id, 'Keisti'); ?>
		<?php echo anchor('groups/delete/'.$group->id, 'Trinti'); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>