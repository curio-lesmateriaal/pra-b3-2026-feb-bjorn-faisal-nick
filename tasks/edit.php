<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taak aanpassen</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>
    <?php require_once '../header.php'?>
    <div class="editDiv">
        <h1>Taak aanpassen</h1>

        <form method="POST" action="../backend/tasksController.php">
            <input type="hidden" name="action" value="update">

            <label>Titel:</label><br>
            <input type="text" name="titel"><br><br>

            <label>Beschrijving:</label><br>
            <textarea name="beschrijving"></textarea><br><br>

            <label>Afdeling:</label><br>
            <select name="afdeling">
                <option value="Personeel">Personeel</option>
                <option value="Horeca">Horeca</option>
                <option value="Techniek">Techniek</option>
                <option value="Inkoop">Inkoop</option>
                <option value="Klantenservice">Klantenservice</option>
                <option value="Groen">Groen</option>
            </select><br><br>

            <label>Status:</label><br>
            <select name="status">
                <option value="open">Open</option>
                <option value="bezig">Bezig</option>
                <option value="klaar">Klaar</option>
            </select><br><br>

            <button type="submit">Opslaan</button>
        </form>
    </div>
    <?php require_once '../footer.php'?>
</body>
</html>