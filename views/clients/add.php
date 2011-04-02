<?php

echo form_open('clients/add');

echo form_label('Vardas', 'firstname');
echo form_input('firstname');

echo form_label('Pavardė', 'lastname');
echo form_input('lastname');

echo form_label('Gimimo data', 'date');
echo form_input('date');

echo form_label('Ūkio pavadinimas', 'name');
echo form_input('name');

echo form_label('Adresas', 'address');
echo form_input('address');

echo form_label('Įmonės kodas', 'company_code');
echo form_input('company_code');

echo form_label('PVM kodas', 'pvm_code');
echo form_input('pvm_code');

echo form_label('Karvių skaičius', 'cow_number');
echo form_input('cow_number');

echo form_label('Telyčių skaičius', 'heifer_number');
echo form_input('heifer_number');

echo form_label('Bulių skaičius', 'bull_number');
echo form_input('bull_number');

echo form_label('Veršelių skaičius', 'calf_number');
echo form_input('calf_number');

echo form_submit('add', 'Pridėti');

echo form_close();

?>