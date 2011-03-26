<?php

echo form_open('users/edit');
	

echo form_label('Username', 'username');
echo form_input('username', $user->username);

echo form_label('Password', 'password');
echo form_password('password');

echo form_label('Email', 'email');
echo form_input('email', $user->email);

echo form_label('Grupė', 'group_id');
echo form_dropdown('group_id', $groups, $user->group_id);

echo form_submit('edit', 'Edit');
	
echo form_close();
?>