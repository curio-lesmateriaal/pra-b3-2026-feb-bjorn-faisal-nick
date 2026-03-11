<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
</head>
<body>
    <header>
        <h1>Hoi Allemaal</h1>

    </header>
    <body>
        <form action="tasksController.php" method="POST">
            <label for="naam">Naam:</label>
            <input type="text" name="naam" id="naam" required>
    
            <label for="bericht">Bericht:</label>
            <textarea name="bericht" id="bericht"></textarea>
    
            <input type="submit" value="Verzenden">
        </form>
        
    </body>
    <footer>

    </footer>
</body>
</html>