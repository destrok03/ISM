<?php
require_once __DIR__ . '/../config/database.php';

class EtudiantRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    
    public function countAll()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM etudiants");
        return $stmt->fetchColumn();
    }

    
    public function findByClasseAndAnnee($classeId = null, $annee = null)
    {
        $sql = "SELECT e.id, e.nom_complet, e.matricule
            FROM etudiants e
            WHERE 1=1";

        $params = [];

        if ($classeId) {
            $sql .= " AND e.classe_id = ?";
            $params[] = $classeId;
        }

        if ($annee) {
            $sql .= " AND e.annee_academique = ?";
            $params[] = $annee;
        }

        $sql .= " ORDER BY e.nom_complet ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
    public function getDemandesByMatricule($matricule)
    {
        $sql = "SELECT d.type_demande, d.raison, d.date_demande, d.statut
                FROM demandes d
                JOIN users u ON d.id_user = u.id
                JOIN etudiants e ON e.id = u.etudiant_id
                WHERE e.matricule = ?
                ORDER BY d.date_demande DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$matricule]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function countByNiveau(): array
    {
        $sql = "SELECT niveau, COUNT(*) as total FROM etudiants GROUP BY niveau";
        $stmt = $this->pdo->query($sql);
        $result = [];
        while ($row = $stmt->fetch()) {
            $result[$row['niveau']] = (int) $row['total'];
        }
        return $result;
    }
}
