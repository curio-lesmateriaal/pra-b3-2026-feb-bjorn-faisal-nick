<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe taak</title>
    <link rel="stylesheet" href="../css/taskscreate.css">
</head>
<body>

    <h1>Nieuwe taak</h1>

    <form method="POST" action="../backend/tasksController.php">
        <input type="hidden" name="action" value="store">
        <input type="hidden" name="status" value="todo">

        <label>Titel:</label><br>
        <input type="text" name="titel" required><br><br>

        <label>Beschrijving:</label><br>
        <textarea name="beschrijving" required></textarea><br><br>

        <label>Afdeling:</label><br>
        <select name="afdeling" required>
            <option value="Personeel">Personeel</option>
            <option value="Horeca">Horeca</option>
            <option value="Techniek">Techniek</option>
            <option value="Inkoop">Inkoop</option>
            <option value="Klantenservice">Klantenservice</option>
            <option value="Groen">Groen</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="todo">To do</option>
            <option value="doing">Doing</option>
            <option value="done">Done</option>
        </select><br><br>

        <button type="submit">Opslaan</button>
    </form>

    <p><a href="index.php">Terug naar takenlijst</a></p>

</body>
</html>
