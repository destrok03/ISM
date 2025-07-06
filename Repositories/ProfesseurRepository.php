<?php
require_once __DIR__ . '/../config/database.php';

class ProfesseurRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    
    public function countAll() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM professeurs");
        return $stmt->fetchColumn();
    }

    
    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM professeurs ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM professeurs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function create(array $data) {
        try {
            $this->pdo->beginTransaction();

            
            $stmt = $this->pdo->prepare("INSERT INTO professeurs (id, nom_complet, grade, adresse) VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $data['id'],
                $data['nom_complet'],
                $data['grade'],
                $data['adresse']
            ]);

            
            if (!empty($data['modules'])) {
                foreach ($data['modules'] as $moduleId) {
                    $stmt = $this->pdo->prepare("INSERT INTO professeur_module (professeur_id, module_id) VALUES (?, ?)");
                    $stmt->execute([$data['id'], $moduleId]);
                }
            }

            
            if (!empty($data['classes'])) {
                foreach ($data['classes'] as $classeId) {
                    $stmt = $this->pdo->prepare("INSERT INTO professeur_classe (professeur_id, classe_id) VALUES (?, ?)");
                    $stmt->execute([$data['id'], $classeId]);
                }
            }

            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
