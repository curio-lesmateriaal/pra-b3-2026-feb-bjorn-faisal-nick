<?php
$naam = $_POST['Naam'];
$bericht = $_POST['Bericht'];

file_put_contents('tasksfile.txt', $naam . "," . $bericht, FILE_APPEND);

echo $naam . "," . $bericht;

$msg = "Bedankt, " . $naam . ". We hebben je bericht ontvangen!"
header("location: ../tasks/create.php")
?>