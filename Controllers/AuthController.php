<?php
require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthController
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userRepo->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['user'] = $user;

                
                switch ($user['role']) {
                    case 'admin':
                        header("Location: /dashboard");
                        break;
                    case 'ac':
                        header("Location: /ac/home");
                        break;
                    case 'etudiant':
                        header("Location: /etudiant/home");
                        break;
                    default:
                        echo "Rôle inconnu. Contactez l'administrateur.";
                        exit;
                }

                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
                require __DIR__ . '/../Views/auth/login.php';
            }
        } else {
            require __DIR__ . '/../Views/auth/login.php';
        }
    }

    
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_complet = $_POST['nom_complet'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $role = $_POST['role'];

            
            if ($password !== $password_confirm) {
                $error = "Les mots de passe ne correspondent pas.";
                require __DIR__ . '/../Views/auth/register.php';
                return;
            }

            
            $allowedRoles = ['admin', 'ac', 'etudiant'];
            if (!in_array($role, $allowedRoles)) {
                $error = "Rôle invalide.";
                require __DIR__ . '/../Views/auth/register.php';
                return;
            }

            
            if ($this->userRepo->findByEmail($email)) {
                $error = "Cet email est déjà utilisé.";
                require __DIR__ . '/../Views/auth/register.php';
                return;
            }

            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            
            $success = $this->userRepo->create([
                'nom_complet' => $nom_complet,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => $role
            ]);

            if ($success) {
                require __DIR__ . '/../Views/auth/success.php';
            } else {
                $error = "Erreur lors de la création du compte.";
                require __DIR__ . '/../Views/auth/register.php';
            }
        } else {
            require __DIR__ . '/../Views/auth/register.php';
        }
    }

    
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
        header("Location: /login");
        exit;
    }
}
