<table>
	<tr>
		<th>id</th>
		<th>Ūkio pavadinimas</th>
		<th>Adresas</th>
		<th>Įmonės kodas</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $clients as $client ): ?>
	<tr>
		<td><?php echo $client->id ?></td>
		<td><?php echo anchor('clients/view/'.$client->id, $client->name ); ?></td>
		<td><?php echo $client->address ?></td>
		<td><?php echo $client->company_code ?></td>
		<td>
		<?php echo anchor('clients/edit/'.$client->id, 'Keisti') ?>
		<?php echo anchor('clients/delete/'.$client->id, 'Trinti') ?>
		</td>
	</tr>
<?php endforeach ?>
</table>