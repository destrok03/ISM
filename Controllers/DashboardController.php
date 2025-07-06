<?php

require_once __DIR__ . '/../Repositories/EtudiantRepository.php';
require_once __DIR__ . '/../Repositories/ProfesseurRepository.php';
require_once __DIR__ . '/../Repositories/ModuleRepository.php';

class DashboardController
{
    private $etudiantRepo;
    private $professeurRepo;
    private $moduleRepo;

    public function __construct()
    {
        $this->etudiantRepo = new EtudiantRepository();
        $this->professeurRepo = new ProfesseurRepository();
        $this->moduleRepo = new ModuleRepository();
    }

    public function index()
    {
        $nbEtudiants = $this->etudiantRepo->countAll();
        $nbProfesseurs = $this->professeurRepo->countAll();
        $nbModules = $this->moduleRepo->countAll();

        //
        $statsParNiveau = $this->etudiantRepo->countByNiveau(); 

        require __DIR__ . '/../Views/admin/dashboard.php';
    }
}
