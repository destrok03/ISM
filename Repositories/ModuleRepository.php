<?php

require_once __DIR__ . '/../config/database.php';

class ModuleRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    
    public function create(array $data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO modules (id, nom) VALUES (:id, :nom)");
        return $stmt->execute([
            'id' => $data['id'],
            'nom' => $data['nom']
        ]);
    }

    
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM modules ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll(): int
    {
        $sql = "SELECT COUNT(*) as total FROM modules";
        $stmt = $this->pdo->query($sql);
        return (int) $stmt->fetch()['total'];
    }

}
