<?php

echo form_open('products/edit/'.$product->id, '', $user_id);

echo form_label('Data', 'date');
echo form_input('date', $product->date);

echo form_label('Pavadinimas', 'name');
echo form_input('name', $product->name);

echo form_label('Inv. numeris', 'number');
echo form_input('number', $product->number);

echo form_label('Importuota', 'country');
echo form_input('country', $product->country);

echo form_label('Įsivežta', 'stock');
echo form_input('stock', $product->stock);

echo form_label('Likutis', 'remain');
echo form_input('remain', $product->remain);

echo form_submit('edit', "Pakeisti");

echo form_close();

?>