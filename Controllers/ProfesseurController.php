<?php

require_once __DIR__ . '/../Repositories/ProfesseurRepository.php';
require_once __DIR__ . '/../Repositories/ModuleRepository.php';
require_once __DIR__ . '/../Repositories/ClasseRepository.php';

class ProfesseurController {
    private $repo;
    private $moduleRepo;
    private $classeRepo;

    public function __construct() {
        $this->repo = new ProfesseurRepository();
        $this->moduleRepo = new ModuleRepository();
        $this->classeRepo = new ClasseRepository();
    }

    
    public function index() {
        $professeurs = $this->repo->getAll();
        require __DIR__ . '/../Views/admin/teacher.php';
    }

    
    public function createForm() {
        $modules = $this->moduleRepo->getAll();
        $classes = $this->classeRepo->getAll();
        require __DIR__ . '/../Views/admin/professeur_create.php';
    }

    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'] ?? null,
                'nom_complet' => $_POST['nom_complet'] ?? '',
                'grade' => $_POST['grade'] ?? '',
                'adresse' => $_POST['adresse'] ?? '',
                'modules' => $_POST['modules'] ?? [],
                'classes' => $_POST['classes'] ?? []
            ];
            $this->repo->create($data);
            header("Location: /professeur");
            exit;
        } else {
            $this->createForm(); 
        }
    }
}
