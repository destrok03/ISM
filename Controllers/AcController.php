<?php

require_once __DIR__ . '/../Repositories/ACRepository.php';

class ACController
{
    private $acRepo;

    public function __construct()
    {
        $this->acRepo = new ACRepository();
    }

    public function home()
    {
        $this->ensureAC();
        require __DIR__ . '/../Views/ac/home.php';
    }

    public function showInscriptionForm()
    {
        $this->ensureAC();
        $classes = $this->acRepo->getAllClasses();
        require __DIR__ . '/../Views/ac/inscription.php';
    }

    public function submitInscription()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $matricule = $_POST['matricule'] ?? null;
            $nomComplet = $_POST['nom_complet'] ?? null;
            $email = $_POST['email'] ?? null;
            $classeId = $_POST['classe_id'] ?? null;
            $annee = $_POST['annee_academique'] ?? null;
            $type = $_POST['type_inscription'] ?? null;
            $niveau = $_POST['niveau'] ?? null;
            $adresse = $_POST['adresse'] ?? null;

            if ($matricule && $nomComplet && $email && $classeId && $annee && $type && $niveau) {
                $data = [
                    'matricule' => $matricule,
                    'nom_complet' => $nomComplet,
                    'email' => $email,
                    'classe_id' => $classeId,
                    'annee_academique' => $annee,
                    'type_inscription' => $type,
                    'niveau' => $niveau,
                    'adresse' => $adresse
                ];

                $this->acRepo->createEtudiant($data);
                header("Location: /ac/home");
                exit;
            } else {
                $_SESSION['error'] = "Veuillez remplir tous les champs du formulaire.";
                header("Location: /ac/inscription");
                exit;
            }
        }
    }

    public function searchEtudiants()
    {
        $classeId = $_GET['classe'] ?? null;
        $annee = $_GET['annee'] ?? null;

        $classes = $this->acRepo->getAllClasses();
        $etudiants = $this->acRepo->searchEtudiants($classeId, $annee);

        require __DIR__ . '/../Views/ac/etudiant_search.php';
    }

    public function listDemandesByMatricule()
    {
        $matricule = $_GET['matricule'] ?? null;
        $demandes = [];

        if ($matricule) {
            // S'il y a besoin de gérer les demandes, réactiver EtudiantRepository ici
            $etudiantRepo = new EtudiantRepository();
            $demandes = $etudiantRepo->getDemandesByMatricule($matricule);
        }

        require __DIR__ . '/../Views/ac/demande_list.php';
    }

    private function ensureAC()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ac') {
            header("Location: /login");
            exit;
        }
    }
}
