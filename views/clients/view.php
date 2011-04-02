<ul class="list">
	<li>Vardas: <?php echo $client->firstname ?></li>
	<li>Pavardė: <?php echo $client->lastname ?></li>
	<li>Gimimo data: <?php echo $client->date ?></li>
	<li>Ūkio pavadinimas: <?php echo $client->name ?></li>
	<li>Adresas: <?php echo $client->address ?></li>
	<li>Įmonės kodas: <?php echo $client->company_code ?></li>
	<li>PVM kodas: <?php echo $client->pvm_code ?></li>
	<li>Gyvulių skaičius:</li>
	<li>
		<ul>
			<li>Karvių skaičius: <?php echo $client->cow_number ?></li>
			<li>Telyčių skaičius: <?php echo $client->heifer_number ?></li>
			<li>Bulių skaičius: <?php echo $client->bull_number ?></li>
			<li>Veršelių skaičius: <?php echo $client->calf_number ?></li>
		</ul>
	</li>
</ul>
