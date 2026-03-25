<?php

class TaskController {

    public function handleRequest($action) {
        if ($action === 'store') {
            $this->storeTask();
        } elseif ($action === 'update') {
            $this->updateTask();
        }
    }

    private function storeTask() {
        $titel = trim($_POST['titel'] ?? '');
        $beschrijving = trim($_POST['beschrijving'] ?? '');
        $afdeling = trim($_POST['afdeling'] ?? '');
        $status = trim($_POST['status'] ?? 'todo');

        if (empty($titel) || empty($beschrijving) || empty($afdeling) || empty($status)) {
            echo "Vul alle velden in.";
            exit;
        }

        $file = __DIR__ . '/../tasks/tasksfile.txt';

        $fp = fopen($file, 'a');
        if ($fp === false) {
            echo "Kon het takenbestand niet openen.";
            exit;
        }

        fputcsv($fp, [$titel, $beschrijving, $afdeling, $status]);
        fclose($fp);

        header("Location: ../tasks/index.php?status=success");
        exit;
    }

    private function updateTask() {
        $id = $_POST['id'] ?? null;

        $titel = trim($_POST['titel'] ?? '');
        $beschrijving = trim($_POST['beschrijving'] ?? '');
        $afdeling = trim($_POST['afdeling'] ?? '');
        $status = trim($_POST['status'] ?? '');

        if ($id === null || !is_numeric($id)) {
            echo "Ongeldige taak.";
            exit;
        }

        if (empty($titel) || empty($beschrijving) || empty($afdeling) || empty($status)) {
            echo "Vul alle velden in.";
            exit;
        }

        $file = __DIR__ . '/../tasks/tasksfile.txt';

        if (!file_exists($file)) {
            echo "Bestand niet gevonden.";
            exit;
        }

        $tasks = file($file, FILE_IGNORE_NEW_LINES);

        if (!isset($tasks[$id])) {
            echo "Taak niet gevonden.";
            exit;
        }

        $tasks[$id] = implode(',', [
            $titel,
            $beschrijving,
            $afdeling,
            $status
        ]);

        file_put_contents($file, implode(PHP_EOL, $tasks));

        header("Location: ../tasks/index.php?status=updated");
        exit;
    }
}

$controller = new TaskController();
$action = $_POST['action'] ?? null;
$controller->handleRequest($action);