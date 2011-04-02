<ul class="menu submenu subsubmenu">
	<li><?php echo anchor('invoices/add', 'Pridėti') ?></li>
	<?php if ( isset($client_id)): ?>
	<li><?php echo anchor('invoices/edit/'.$client_id, 'Keisti') ?></li>
	<li><?php echo anchor('invoices/delete/'.$client_id, 'Trinti') ?></li>
	<?php endif; ?>
</ul>