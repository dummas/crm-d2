<ul class="menu submenu">
	<li><?php echo anchor('products/add', 'Pridėti') ?></li>
	<?php if (isset($product_id)): ?>
	<li><?php echo anchor('products/edit/'.$product_id, 'Keisti') ?></li>
	<li><?php echo anchor('products/delete/'.$product_id, 'Trinti') ?></li>
	<?php endif; ?>
</ul>