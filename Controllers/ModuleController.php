<?php

require_once __DIR__ . '/../Repositories/ModuleRepository.php';

class ModuleController {
    private $moduleRepo;

    public function __construct() {
        $this->moduleRepo = new ModuleRepository();
    }

    public function index() {
        require __DIR__ . '/../Views/admin/module_create.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['module_id'] ?? null;
            $nom = $_POST['module_name'] ?? null;

            if ($id && $nom) {
                $this->moduleRepo->create([
                    'id' => $id,
                    'nom' => $nom
                ]);
                header('Location: /module');
                exit;
            } else {
                echo "Champs manquants.";
            }
        }
    }
}
