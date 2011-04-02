<?php

echo form_open('invoices_sellers/add');

echo form_label('Faktūra', 'invoice_id');

echo form_dropdown('invoice_id', $invoices, $invoice_id);

echo form_label('Pavadinimas', 'name');
echo form_input('name');

echo form_label('Įmonės kodas', 'company_code');
echo form_input('company_code');

echo form_label('PVM kodas', 'pvm_code');
echo form_input('pvm_code');

echo form_label('A/S', 'as_code');
echo form_input('as_code');

echo form_label('Bankas', 'bank');
echo form_input('bank');

echo form_submit('add', 'Add');
echo form_close();

?>