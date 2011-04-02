<ul class="menu submenu">
	<li><?php echo anchor('invoices/roll', 'Faktūros') ?></li>
	<li><?php echo anchor('invoices_buyers/roll', 'Pirkėjai') ?></li>
	<li><?php echo anchor('invoices_sellers/roll', 'Pardavėjai') ?></li>
	<li><?php echo anchor('invoices_products/roll', 'Produktai') ?></li>
	<?php if ( isset($client_id)): ?>
	<li><?php echo anchor('invoices/edit/'.$client_id, 'Keisti') ?></li>
	<li><?php echo anchor('invoices/delete/'.$client_id, 'Trinti') ?></li>
	<?php endif; ?>
</ul>