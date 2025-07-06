<?php

require_once __DIR__ . '/../Repositories/ClasseRepository.php';

class ClasseController {
    private $classeRepo;

    public function __construct() {
        $this->classeRepo = new ClasseRepository();
    }

    
    public function index(): void {
    $nomfiliere = $_GET['nomfiliere'] ?? null;
    $niveau = $_GET['niveau'] ?? null;
    $search = $_GET['search'] ?? null;

    $classes = $this->classeRepo->getAll($nomfiliere, $niveau, $search);

    require __DIR__ . '/../Views/admin/classe.php';
}


    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'] ?? '';
            $nomfiliere = $_POST['nomfiliere'] ?? '';
            $niveau = $_POST['niveau'] ?? '';

            if (!empty($libelle) && !empty($nomfiliere) && !empty($niveau)) {
                $this->classeRepo->create([
                    'libelle' => $libelle,
                    'nomfiliere' => $nomfiliere,
                    'niveau' => $niveau
                ]);
            }

            header("Location: /classe");
            exit;
        }
    }
}
