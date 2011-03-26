<?php
if ( isset($user) )
	echo form_open('users/edit');
else
	echo form_open('users/add');
	

echo form_label('Username', 'username');
echo form_input('username', isset($user)?$user->username:null);

echo form_label('Password', 'password');
echo form_password('password');

echo form_label('Email', 'email');
echo form_input('email', isset($user)?$user->email:null);

echo form_label('Grupė', 'group_id');
echo form_dropdown('group_id', $groups, isset($user)?$user->group_id:null);

if ( isset($user) )
	echo form_submit('edit', 'Edit');
else
	echo form_submit('add', 'Add');
	
echo form_close();
?>