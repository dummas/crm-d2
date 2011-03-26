<?php

echo form_open('users/delete','', $user_id);
echo form_submit('delete', 'Patvirtinti');
echo form_close();

?>