<table>
	<tr>
		<th>id</th>
		<th>Numeris</th>
		<th>Data</th>
		<th>Pavadinimas</th>
		<th>Veiskmai</th>
	</tr>
<?php foreach ( $products as $product ): ?>
	<tr>
		<td><?php echo $product->id ?></td>
		<td><?php echo anchor('products/view/'.$product->id, $product->number ) ?></td>
		<td><?php echo $product->date ?></td>
		<td><?php echo $product->name ?></td>
		<td>
		<?php echo anchor('products/edit/'.$product->id, 'Keisti'); ?>
		<?php echo anchor('products/delete/'.$product->id, 'Trinti'); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>