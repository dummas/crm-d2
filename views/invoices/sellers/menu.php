<ul class="menu submenu subsubmenu">
	<li><?php echo anchor('invoices_sellers/add', 'Pridėti') ?></li>
	<?php if ( isset($client_id)): ?>
	<li><?php echo anchor('invoices_sellers/edit/'.$client_id, 'Keisti') ?></li>
	<li><?php echo anchor('invoices_sellers/delete/'.$client_id, 'Trinti') ?></li>
	<?php endif; ?>
</ul>