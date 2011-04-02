<ul class="menu submenu">
	<li><?php echo anchor('clients/add', 'Pridėti') ?></li>
	<?php if ( isset($client_id)): ?>
	<li><?php echo anchor('clients/edit/'.$client_id, 'Keisti') ?></li>
	<li><?php echo anchor('clients/delete/'.$client_id, 'Trinti') ?></li>
	<?php endif; ?>
</ul>