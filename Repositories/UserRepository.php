<?php

class UserRepository {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=gestion_inscription', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    
    public function create($user): bool {
        $sql = "INSERT INTO users (nom_complet, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $user['nom_complet'],
            $user['email'],
            $user['password'],
            $user['role']
        ]);
    }

    
    public function findByEmail($email): ?array {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

}

