<?php
require_once 'app/Repositories/UserRepository.php';

class AuthService {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    public function login($email, $password) {
        $user = $this->userRepo->findByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public function register($nom_complet, $email, $password, $role) {
        $user = new stdClass();
        $user->nom_complet = $nom_complet;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->role = $role;
        return $this->userRepo->create($user);
    }
}
