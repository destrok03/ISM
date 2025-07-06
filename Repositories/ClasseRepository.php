<?php

require_once __DIR__ . '/../config/database.php';

class ClasseRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    
    public function getAll($nomfiliere = null, $niveau = null, $search = null) {
        $query = "SELECT * FROM classes WHERE 1=1";
        $params = [];

        if (!empty($nomfiliere)) {
            $query .= " AND nomfiliere = :nomfiliere";
            $params['nomfiliere'] = $nomfiliere;
        }

        if (!empty($niveau)) {
            $query .= " AND niveau = :niveau";
            $params['niveau'] = $niveau;
        }

        if (!empty($search)) {
            $query .= " AND libelle LIKE :search";
            $params['search'] = '%' . $search . '%';
        }

        $query .= " ORDER BY id DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function create(array $data) {
        $stmt = $this->pdo->prepare("INSERT INTO classes (libelle, nomfiliere, niveau) VALUES (:libelle, :nomfiliere, :niveau)");
        return $stmt->execute([
            'libelle' => $data['libelle'],
            'nomfiliere' => $data['nomfiliere'],
            'niveau' => $data['niveau']
        ]);
    }
}
