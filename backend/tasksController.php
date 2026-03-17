<?php

class TaskController {

    public function handleRequest($action) {
        if ($action === 'store') {
            $this->storeTask();
        }
    }

    private function storeTask() {
        $naam = $_POST['Naam'] ?? 'Anoniem';
        $bericht = $_POST['Bericht'] ?? '';

        file_put_contents('tasksfile.txt', $naam . "," . $bericht . PHP_EOL, FILE_APPEND);

        header("Location: ../tasks/create.php?status=success");
        exit;
    }
}

$controller = new TaskController();
$action = $_GET['action'] ?? 'store';
$controller->handleRequest($action);

veranderen