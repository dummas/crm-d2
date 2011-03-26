<div class="wrap">
	<div class="center">
<?php 

if (isset($message) )
{
	echo $message;
}

echo form_open('users/login');
echo form_label('Username', 'username');
echo form_input('username');
echo form_label('Password', 'password');
echo form_password('password');
echo form_submit('login', 'Login');
echo form_close(); 

?>
	</div>
</div>