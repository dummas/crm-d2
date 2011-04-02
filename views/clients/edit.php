<?php

echo form_open('clients/edit/'.$client->id);

echo form_label('Vardas', 'firstname');
echo form_input('firstname', $client->firstname);

echo form_label('Pavardė', 'lastname');
echo form_input('lastname', $client->lastname);

echo form_label('Gimimo data', 'date');
echo form_input('date', $client->date);

echo form_label('Ūkio pavadinimas', 'name');
echo form_input('name', $client->name);

echo form_label('Adresas', 'address');
echo form_input('address', $client->address);

echo form_label('Įmonės kodas', 'company_code');
echo form_input('company_code', $client->company_code);

echo form_label('PVM kodas', 'pvm_code');
echo form_input('pvm_code', $client->pvm_code);

echo form_label('Karvių skaičius', 'cow_number');
echo form_input('cow_number', $client->cow_number);

echo form_label('Telyčių skaičius', 'heifer_number');
echo form_input('heifer_number', $client->heifer_number);

echo form_label('Bulių skaičius', 'bull_number');
echo form_input('bull_number', $client->bull_number);

echo form_label('Veršelių skaičius', 'calf_number');
echo form_input('calf_number', $client->calf_number);

echo form_submit('edit', 'Atnaujinti');

echo form_close();

?>