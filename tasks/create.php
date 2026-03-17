<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<body>

    <h1>Nieuwe taak</h1>

    <form method="POST" action="../controllers/tasksController.php">
        <input type="hidden" name="action" value="create">

        <label>Titel:</label><br>
        <input type="text" name="title"><br><br>

        <label>Beschrijving:</label><br>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Opslaan</button>
    </form>

</body>
</html>
</html>