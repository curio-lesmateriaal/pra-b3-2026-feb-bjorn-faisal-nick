<?php

class TaskController {

    public function handleRequest($action) {
        if ($action === 'store') {
            $this->storeTask();
        }
    }

    private function storeTask() {
        // Gegevens uit het formulier ophalen 
        $titel = trim($_POST['titel'] ?? '');
        $beschrijving = trim($_POST['beschrijving'] ?? '');
        $afdeling = trim($_POST['afdeling'] ?? '');
        $status = trim($_POST['status'] ?? 'todo');

        if (empty($titel) || empty($beschrijving) || empty($afdeling) || empty($status)) {
            echo "Vul alle velden in.";
            exit;
        }
        // Invoer beveiligen zet alles om naar veilige tekst
        $titel = htmlspecialchars($titel);
        $beschrijving = htmlspecialchars($beschrijving);
        $afdeling = htmlspecialchars($afdeling);
        $status = htmlspecialchars($status);

        $file = __DIR__ . '/../tasks/tasksfile.txt';
        // Bestand openen
        $fp = fopen($file, 'a');
        if ($fp === false) {
            echo "Kon het takenbestand niet openen.";
            exit;
        }
        // taken opslaan als CSV-regel om later makkelijk te kunnen lezen
        fputcsv($fp, [$titel, $beschrijving, $afdeling, $status]);
        fclose($fp);

        header("Location: ../tasks/index.php?status=success");
        exit;
    }
}

$controller = new TaskController();
$action = $_POST['action'] ?? null;
$controller->handleRequest($action);