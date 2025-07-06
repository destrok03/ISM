<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/ClasseController.php';
require_once __DIR__ . '/../Controllers/ModuleController.php';
require_once __DIR__ . '/../Controllers/DashboardController.php';
require_once __DIR__ . '/../Controllers/ProfesseurController.php';
require_once __DIR__ . '/../Controllers/EtudiantController.php';
require_once __DIR__ . '/../Controllers/ACController.php';
require_once __DIR__ . '/../Controllers/DemandeController.php';
require_once __DIR__ . '/../Controllers/AdminController.php';



$authCtrl = new AuthController();
$classeCtrl = new ClasseController();
$moduleCtrl = new ModuleController();
$dashboardCtrl = new DashboardController();
$profCtrl = new ProfesseurController();
$etudiantCtrl = new EtudiantController();
$acCtrl = new ACController();
$demandeCtrl = new DemandeController();
$adminCtrl = new AdminController();


$uri = str_replace('/ISM/public', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));


switch ($uri) {
    
    case '/':
    case '/login':
        $authCtrl->login();
        break;

    case '/register':
        $authCtrl->register();
        break;

    case '/success':
        require __DIR__ . '/../Views/auth/success.php';
        break;

    case '/logout':
        $authCtrl->logout();
        break;

    
        
    case '/dashboard':
        $dashboardCtrl->index();
        break;

    
    case '/classe':
        $classeCtrl->index();
        break;

    case '/classe/create':
        $classeCtrl->create();
        break;

    
    case '/module':
        $moduleCtrl->index();
        break;

    case '/module/create':
        $moduleCtrl->create();
        break;

    
    case '/professeur':
        $profCtrl->index();
        break;

    case '/professeur/create':
        $profCtrl->create();
        break;

    
    case '/etudiant':
    case '/etudiant/home':
        $etudiantCtrl->home();
        break;

    case '/demande/create':
        $etudiantCtrl->createDemande();
        break;

    case '/demande/store':
        $etudiantCtrl->storeDemande();
        break;

    
    case '/ac/home':
        $acCtrl->home();
        break;

    case '/ac/inscription':
        $acCtrl->showInscriptionForm();
        break;

    case '/ac/inscription/submit':
        $acCtrl->submitInscription();
        break;

    case '/ac/etudiants':
        $acCtrl->searchEtudiants();
        break;

    case '/admin/demande':
        $adminCtrl->demandeList();
        break;


    case '/admin/demande/update':
        $adminCtrl->updateStatut();
        break;


    case '/ac/demandes':
        $demandeCtrl->demandesAC();
        break;



    case '/demande/list':
        $demandeCtrl->mesDemandes();
        break;



    
    default:
        echo "404 - Page non trouvée ou en cours de développement.";
        break;
}
