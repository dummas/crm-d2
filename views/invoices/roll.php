<table>
	<tr>
		<th>id</th>
		<th>Data</th>
		<th>Serija</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $invoices as $invoice ): ?>
	<tr>
		<td><?php echo $invoice->id ?></td>
		<td><?php echo $invoice->date ?></td>
		<td><?php echo anchor('invoices/view/'.$invoice->id, $invoice->series ) ?></td>
		<td>
		<?php echo anchor('invoices/view/'.$invoice->id, 'Peržiūrėti' ); ?>
		<?php echo anchor('invoices/edit/'.$invoice->id, 'Keisti' ); ?>
		<?php echo anchor('invoices/delete/'.$invoice->id, 'Trinti' ); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>