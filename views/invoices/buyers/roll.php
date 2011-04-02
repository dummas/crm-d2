<table>
	<tr>
		<th>Id</th>
		<th>Faktūros serija</th>
		<th>Pavadinimas</th>
		<th>Įmonės kodas</th>
		<th>PVM kodas</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $buyers as $buyer ): ?>
	<tr>
		<td><?php echo $buyer->id ?></td>
		<td><?php echo anchor('invoices/view/'.$buyer->invoice_id,$buyer->series ); ?></td>
		<td><?php echo anchor('invoices_buyers/'.$buyer->id ,$buyer->name ); ?></td>
		<td><?php echo $buyer->company_code ?></td>
		<td><?php echo $buyer->pvm_code ?></td>
		<td>
		<?php echo anchor('invoices_buyers/view/'.$buyer->id, 'Peržiūrėti' ); ?>
		<?php echo anchor('invoices_buyers/edit/'.$buyer->id, 'Keisti' ); ?>
		<?php echo anchor('invoices_buyers/delete/'.$buyer->id, 'Trinti' ); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>