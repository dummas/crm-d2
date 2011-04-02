<table>
	<tr>
		<th>Id</th>
		<th>Faktūros serija</th>
		<th>Pavadinimas</th>
		<th>Kiekis</th>
		<th>Veiksmai</th>
	</tr>
<?php foreach ( $products as $product ): ?>
	<tr>
		<td><?php echo $product->id ?></td>
		<td><?php echo anchor('invoices/view/'.$product->invoice_id, $product->series ) ?></td>
		<td><?php echo anchor('invoices_products/view/'.$product->id, $product->name ) ?></td>
		<td><?php echo $product->quantity ?></td>
		<td>
		<?php echo anchor('invoices_products/view/'.$product->id, 'Peržiūrėti' ); ?>
		<?php echo anchor('invoices_products/edit/'.$product->id, 'Keisti' ); ?>
		<?php echo anchor('invoices_products/delete/'.$product->id, 'Trinti' ); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>