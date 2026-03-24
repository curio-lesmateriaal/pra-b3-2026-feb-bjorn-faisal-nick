<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lijst</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    
    <header>
        <div class="wrapper">
            <div class="Topnav">
                <nav>
                    <a href="../index.php">Home</a>
                    <a href="afdelingen.php">Afdelingen</a>
                    <a href="tickets.php">tickets</a> 
                </nav>
            </div>
        </div>
    </header>
    <div class="Ticketcontainer">
        <main>
            <div class="ticketnav">
                <nav>
                    <a href="index.php">ticket maken</a>
                    <a href="edit.php">ticket aanpassen</a>
                    <a href="done.php">ticket history</a>
                </nav>
            </div>
        </main>
    </div>
    <?php require_once '../footer.php'; ?>
</body>
</html>