<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}

$nomUser = $_SESSION['user']['nom_complet'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des enseignants</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #8a4b12;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        .sidebar img {
            height: 70px;
            margin-bottom: 40px;
        }

        .sidebar nav a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 12px 0;
            padding: 8px 12px;
            border-radius: 6px;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background-color: #c07e3d;
        }

        .main {
            flex: 1;
            padding: 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .search-bar {
            padding: 8px 12px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 250px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn-ajouter {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #8a4b12;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn-ajouter:hover {
            background-color: #a35d1d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5e2c6;
            color: #333;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="/assets/images/logo-ism.jpeg" alt="ISM Logo">
    <nav>
        <a href="/dashboard">Dashboard</a>
        <a href="/professeur" class="active">Teachers</a>
        <a href="/admin/demande">Demande</a>
        <a href="/classe">Classe</a>
        <a href="/module">Module</a>
    </nav>
</div>

<div class="main">
    <div class="topbar">
        <input type="text" class="search-bar" placeholder="Search...">
        <div class="user-info">
            <img src="/assets/images/avatar.jpeg" alt="Avatar">
            <span><?= htmlspecialchars($nomUser) ?></span>
        </div>
    </div>

    <h2>Liste des enseignants</h2>

    <!-- 🔘 Bouton Ajouter -->
    <a href="/professeur/create" class="btn-ajouter">+ Ajouter un professeur</a>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>nom_complet</th>
            <th>grade</th>
            <th>adresse</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($professeurs as $prof): ?>
            <tr>
                <td><?= htmlspecialchars($prof['id']) ?></td>
                <td><?= htmlspecialchars($prof['nom_complet']) ?></td>
                <td><?= htmlspecialchars($prof['grade']) ?></td>
                <td><?= htmlspecialchars($prof['adresse']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
