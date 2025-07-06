<?php

class EtudiantController
{

    public function home()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        require __DIR__ . '/../Views/etudiant/etudiant_home.php';
    }

    public function createDemande()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        require __DIR__ . '/../Views/etudiant/demande_create.php';
    }

    public function storeDemande()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $user = $_SESSION['user'] ?? null;

            if (!$user || $user['role'] !== 'etudiant') {
                header("Location: /login");
                exit;
            }

            require_once __DIR__ . '/../config/database.php';
            $pdo = Database::connect();

            $stmt = $pdo->prepare("
                INSERT INTO demandes (etudiant_id, type_demande, raison, date_demande, statut)
                VALUES (?, ?, ?, ?, 'Pending')
            ");

            $stmt->execute([
                $user['id'],                       
                $_POST['type_demande'] ?? '',    
                $_POST['raison'] ?? '',
                $_POST['date_demande'] ?? date('Y-m-d')
            ]);

            header("Location: /demande/list");
            exit;
        }
    }

    public function listDemandes()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        require_once __DIR__ . '/../config/database.php';
        $pdo = Database::connect();

        $stmt = $pdo->prepare("SELECT * FROM demandes WHERE etudiant_id = ?");
        $stmt->execute([$_SESSION['user']['id']]);
        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/etudiant/demande_list.php';
    }
}
