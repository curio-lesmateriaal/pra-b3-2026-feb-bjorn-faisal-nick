<?php
$tasksFile = __DIR__ . '/../backend/tasksfile.txt';
$id = $_GET['id'] ?? null;

$tasks = file($tasksFile, FILE_IGNORE_NEW_LINES);

if ($id === null || !isset($tasks[$id])) {
    echo "Taak niet gevonden.";
    exit;
}

$data = str_getcsv($tasks[$id]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taak aanpassen</title>
    <link rel="stylesheet" href="../css/tasksindex.css">
</head>
<body>

<div class="container">
    <header>
        <nav>
            <a href="../index.php">Home</a>
            <a href="afdelingen.php">Afdelingen</a>
            <a href="tickets.php">Tickets</a> 
        </nav>
    </header>

    <div class="editDiv">
        <h1>Taak aanpassen</h1>

        <form method="POST" action="../backend/tasksController.php">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>Titel:</label><br>
            <input type="text" name="titel" 
                value="<?php echo htmlspecialchars($data[0]); ?>"><br><br>

            <label>Beschrijving:</label><br>
            <textarea name="beschrijving"><?php echo htmlspecialchars($data[1]); ?></textarea><br><br>

            <label>Afdeling:</label><br>
            <select name="afdeling">
                <option value="Personeel" <?php if($data[2]=='Personeel') echo 'selected'; ?>>Personeel</option>
                <option value="Horeca" <?php if($data[2]=='Horeca') echo 'selected'; ?>>Horeca</option>
                <option value="Techniek" <?php if($data[2]=='Techniek') echo 'selected'; ?>>Techniek</option>
                <option value="Inkoop" <?php if($data[2]=='Inkoop') echo 'selected'; ?>>Inkoop</option>
                <option value="Klantenservice" <?php if($data[2]=='Klantenservice') echo 'selected'; ?>>Klantenservice</option>
                <option value="Groen" <?php if($data[2]=='Groen') echo 'selected'; ?>>Groen</option>
            </select><br><br>

            <label>Status:</label><br>
            <select name="status">
                <option value="todo" <?php if($data[3]=='todo') echo 'selected'; ?>>To do</option>
                <option value="doing" <?php if($data[3]=='doing') echo 'selected'; ?>>Doing</option>
                <option value="done" <?php if($data[3]=='done') echo 'selected'; ?>>Done</option>
            </select><br><br>

            <button type="submit">Opslaan</button>
        </form>
    </div>
</div>

<?php require_once '../footer.php'?>

</body>
</html>