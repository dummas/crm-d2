<?php

echo form_open('invoices_products/edit/'.$product_id);

echo form_label('Faktūra', 'invoice_id');

echo form_dropdown('invoice_id', $invoices, $invoice_id);

echo form_label('Pavadinimas', 'name');
echo form_input('name', $product->name);

echo form_input('measurement');
echo form_input('quantity');
echo form_input('price');

echo form_submit('add', 'Add');
echo form_close();

?>