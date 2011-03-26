<?php

echo form_open('groups/add');
echo form_label('Pavadinimas', 'name');
echo form_input('name');
echo form_label('Grupė priklauso', 'parent_id');
echo form_dropdown('parent_id', $groups);
echo form_submit('add', 'Add');
echo form_close();

?>