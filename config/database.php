<?php

class Database {
    public static function connect() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=gestion_inscription", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
