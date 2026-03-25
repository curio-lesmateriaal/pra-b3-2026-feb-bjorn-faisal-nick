<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="../css/tasksindex.css">
</head>
<body>

<div class="container">

    <img src="../img/logo-big-v4.png" alt="Logo" style="width:120px; margin-bottom:20px;">

    <h1>Tasks overzicht</h1>


    <p><a href="create.php">Nieuwe taak aanmaken</a></p>


<!-- Controleren of een taak succesvol is opgeslagen -->

    <p><a href="create.php">Nieuwe taak maken</a></p>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
        <p style="color:green;">Taak succesvol opgeslagen.</p>
    <?php endif; ?>

    <?php
    // Het pad naar het bestand met taken
    $tasksFile = __DIR__ . '/tasksfile.txt';
    $tasks = [];

    if (file_exists($tasksFile)) {
        if (($handle = fopen($tasksFile, 'r')) !== false) {
            // Elke regel uit het bestand lezen en omzetten naar een taak
            while (($row = fgetcsv($handle)) !== false) {
                if (count($row) < 4) {
                    continue;
                }

                $tasks[] = [
                    'titel' => $row[0],
                    'beschrijving' => $row[1],
                    'afdeling' => $row[2],
                    'status' => $row[3],
                ];
            }
            fclose($handle);
        }
    }
        // taken filteren (klaar = verwijderen) om alleen open taken te tonen
    $tasks = array_filter($tasks, function ($task) {
        $status = strtolower(trim($task['status']));
        return $status !== 'done' && $status !== 'klaar';
    });
    ?>
    <!-- als er geen taken zijn, tonen we een bericht -->
    <?php if (count($tasks) === 0): ?>
        <p>Er zijn momenteel geen open taken.</p>
    <?php else: ?>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                    <th>Afdeling</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                            <!-- Dit stukje code zet de gegevens van een taak in een tabelcel op de webpagina. -->
                        <td><?php echo htmlspecialchars($task['titel']); ?></td>
                        <td><?php echo htmlspecialchars($task['beschrijving']); ?></td>
                        <td><?php echo htmlspecialchars($task['afdeling']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>