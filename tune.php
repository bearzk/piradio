<?php

$radio = '/usr/local/bin/piradio';

if (isset($_GET['station'])) {
	// Station IDs may consist of digits or lowercase letters, max 7 characters
	$station = substr(preg_replace('/[^a-z0-9]+/', '', $_GET['station']), 0, 7);
	if (strlen($station))
		// Tune to station, discard output if any
		exec($radio . ' ' . $station);
}

// Get status
unset($output);
exec($radio, $output);
foreach ($output as $line) {
	$trimmed = trim($line);
	if (strlen($trimmed))
		echo $trimmed . PHP_EOL;
}

?>
