<?php

echo form_open('users/add');
echo form_label('Username', 'username');
echo form_input('username');
echo form_label('Password', 'password');
echo form_password('password');
echo form_label('Email', 'email');
echo form_input('email');
echo form_submit('add', 'Add');
echo form_close();
?>