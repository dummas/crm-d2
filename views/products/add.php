<?php

echo form_open('products/add', '', $user_id);

echo form_label('Data', 'date');
echo form_input('date');

echo form_label('Pavadinimas', 'name');
echo form_input('name');

echo form_label('Inv. numeris', 'number');
echo form_input('number');

echo form_label('Importuota', 'country');
echo form_input('country');

echo form_label('Įsivežta', 'stock');
echo form_input('stock');

echo form_label('Likutis', 'remain');
echo form_input('remain');

echo form_submit('add', "Ivesti");

echo form_close();

?>