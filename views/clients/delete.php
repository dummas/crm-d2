<?php

echo form_open('clients/delete','', $client_id);
echo form_submit('delete', 'Patvirtinti');
echo form_close();

?>