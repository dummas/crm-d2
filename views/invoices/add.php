<?php

echo form_open('invoices/add', '', $user_id);

echo form_label('Serija', 'series');
echo form_input('series');

echo form_label('Data', 'date');
echo form_input('date');

echo form_submit('add', 'Add');
echo form_close();

?>