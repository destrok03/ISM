<?php

class AdminController
{
    public function demandeList()
    {
        require_once __DIR__ . '/../config/database.php';
        $pdo = Database::connect();

        $stmt = $pdo->query("
        SELECT d.id, e.matricule, e.nom_complet, d.type_demande, d.raison, d.date_demande, d.statut
        FROM demandes d
        JOIN etudiants e ON d.etudiant_id = e.matricule
    ");
        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/admin/demande_admin.php';
    }


    public function updateStatut()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
                header("Location: /login");
                exit;
            }

            require_once __DIR__ . '/../config/database.php';
            $pdo = Database::connect();

            $id = $_POST['id'] ?? null;
            $statut = $_POST['statut'] ?? null;

            if ($id && in_array($statut, ['Accepted', 'Rejected'])) {
                $stmt = $pdo->prepare("UPDATE demandes SET statut = ? WHERE id = ?");
                $stmt->execute([$statut, $id]);
            }

            header("Location: /admin/demande");
            exit;
        }
    }
}
