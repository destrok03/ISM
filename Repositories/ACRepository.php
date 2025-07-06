<?php

require_once __DIR__ . '/../config/database.php';

class ACRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    
    public function getAllClasses()
    {
        $stmt = $this->pdo->query("SELECT id, libelle FROM classes ORDER BY libelle ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function createEtudiant(array $data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO etudiants (matricule, nom_complet, email, classe_id, annee_academique, type_inscription, niveau, adresse)
            VALUES (:matricule, :nom_complet, :email, :classe_id, :annee_academique, :type_inscription, :niveau, :adresse)
        ");
        return $stmt->execute([
            'matricule' => $data['matricule'],
            'nom_complet' => $data['nom_complet'],
            'email' => $data['email'],
            'classe_id' => $data['classe_id'],
            'annee_academique' => $data['annee_academique'],
            'type_inscription' => $data['type_inscription'],
            'niveau' => $data['niveau'],
            'adresse' => $data['adresse'] ?? null
        ]);
    }

    
    public function searchEtudiants($classeId, $annee)
    {
        $sql = "SELECT e.id, e.nom_complet, e.matricule, e.niveau, c.libelle AS libelle FROM etudiants e
        JOIN classes c ON c.id = e.classe_id
        WHERE 1=1";

        $params = [];

        if (!empty($classeId)) {
            $sql .= " AND classe_id = ?";
            $params[] = $classeId;
        }

        if (!empty($annee)) {
            $sql .= " AND annee_academique = ?";
            $params[] = $annee;
        }

        $sql .= " ORDER BY nom_complet ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
