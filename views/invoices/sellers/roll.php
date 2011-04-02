<table>
	<tr>
		<th>Id</th>
		<th>Faktūros serija</th>
		<th>Pavadinimas</th>
		<th>Įmonės kodas</th>
		<th>PVM kodas</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $sellers as $seller ): ?>
	<tr>
		<td><?php echo $seller->id ?></td>
		<td><?php echo anchor( 'invoices/view/'.$seller->invoice_id ,$seller->series ) ?></td>
		<td><?php echo anchor( 'invoices_sellers/view/'.$seller->id, $seller->name ) ?></td>
		<td><?php echo $seller->company_code ?></td>
		<td><?php echo $seller->pvm_code ?></td>
		<td>
		<?php echo anchor('invoices_sellers/view/'.$seller->id, 'Peržiūrėti' ); ?>
		<?php echo anchor('invoices_sellers/edit/'.$seller->id, 'Keisti' ); ?>
		<?php echo anchor('invoices_sellers/delete/'.$seller->id, 'Trinti' ); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>