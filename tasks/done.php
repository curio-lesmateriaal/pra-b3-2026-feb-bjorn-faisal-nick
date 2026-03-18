<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Afgeronde taken (done)</h1>
    <a href="index.php">Terug naar overzicht</a><br><br>
    <?php

    $file = __DIR__ . '/tasksfile.txt';

    if (!file_exists($file)) {
        echo "Geen taken gevonden.";
        exit;
    }

    $lines = file($file);

    echo "<ul>";

    foreach ($lines as $line) {

        $parts = explode(",", trim($line));

        if (count($parts) >= 4) {
            $titel = $parts[0];
            $afdeling = $parts[2];
            $status = $parts[3];

            if ($status === "klaar") {
                echo "<li>$titel - $afdeling</li>";
            }
        }
    }

    echo "</ul>";

    ?>

</body>
</html>