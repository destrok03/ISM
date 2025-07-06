<?php

require_once __DIR__ . '/../config/database.php';

class DemandeController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // Afficher la liste des demandes
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: /login");
            exit;
        }

        $stmt = $this->pdo->query("
            SELECT d.id AS demande_id, d.type_demande, d.raison, d.date_demande, d.statut,
             e.matricule, e.nom_complet
            FROM demandes d
            JOIN etudiants e ON e.matricule = d.etudiant_id
            ORDER BY d.date_demande DESC
        ");

        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/admin/demande_list.php';
    }

    // Liste des demandes de l’étudiant connecté
    public function mesDemandes()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'etudiant') {
            header("Location: /login");
            exit;
        }

        $stmt = $this->pdo->query("
        SELECT d.id, d.type_demande, d.raison, d.date_demande, d.statut FROM demandes d
        ORDER BY d.date_demande DESC
    ");

        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/etudiant/demande_list.php';
    }


    // Mettre à jour le statut d'une demande (Accepté / Refusé)
    public function updateStatut()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $demandeId = $_POST['demande_id'] ?? null;
            $statut = $_POST['statut'] ?? null;

            if ($demandeId && in_array($statut, ['Accepté', 'Refusé'])) {
                $stmt = $this->pdo->prepare("UPDATE demandes SET statut = ? WHERE id = ?");
                $stmt->execute([$statut, $demandeId]);
            }
        }

        header("Location: /admin/demandes");
        exit;
    }

    // Afficher les demandes côté AC
    public function demandesAC()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ac') {
            header("Location: /login");
            exit;
        }

        $stmt = $this->pdo->query("
        SELECT d.id, d.type_demande, d.raison, d.date_demande, d.statut FROM demandes d
        ORDER BY d.date_demande DESC
    ");

        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/ac/demande_list.php';  // ⚠ Crée cette vue si elle n'existe pas
    }

}
