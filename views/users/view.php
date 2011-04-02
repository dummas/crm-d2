<ul class="list">
	<li>Vartotojo vardas: <?php echo $user->username; ?></li>
	<li>Email: <?php echo $user->email ?></li>
	<li>Groupė: <?php echo anchor('groups/view/'.$user->group_id, $user->group_name ); ?></li>
	<li>Klientų skaičius: 0</li>
	<li>Važtaraščių skaičius: 0</li>
	<li>Faktūrų skaičius: 0</li>
</ul>