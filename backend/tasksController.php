<?php

class TaskController {

    public function handleRequest($action) {
        if ($action === 'store') {
            $this->storeTask();
        }
    }

    private function storeTask() {

        $naam = trim($_POST['Naam'] ?? '');
        $bericht = trim($_POST['Bericht'] ?? '');

        if (empty($naam) || empty($bericht)) {
            echo "Vul alle velden in.";
            exit;
        }

        $naam = htmlspecialchars($naam);
        $bericht = htmlspecialchars($bericht);

        $file = __DIR__ . '/../tasks/tasksfile.txt';

        file_put_contents($file, $naam . "," . $bericht . PHP_EOL, FILE_APPEND);

        header("Location: ../tasks/create.php?status=success");
        exit;
    }
}

$controller = new TaskController();
$action = $_POST['action'] ?? null;
$controller->handleRequest($action);