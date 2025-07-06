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
    <title>Recherche Étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .menu a {
            margin-left: 25px;
            color: #5d3209;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            padding: 40px;
        }

        h2 {
            color: #5d3209;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
        }

        select,
        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            margin-top: 20px;
            background-color: #804000;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            margin-top: 40px;
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #e3d2c1;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }
    </style>
</head>

<body>

<header>
    <div>
        <img src="/assets/images/logo-ism.jpeg" alt="ISM" style="height: 40px;">
    </div>
    <div class="menu">
        <a href="/ac/home">home</a>
        <a href="/ac/inscription">inscription/réinscription</a>
        <a href="/ac/search-etudiants">liste les étudiants</a>
        <a href="/ac/demandes">lister les demandes</a>
        <img src="/assets/images/avatar.jpeg" alt="avatar"
             style="height: 32px; vertical-align: middle; margin-left: 10px;">
    </div>
</header>

<div class="container">
    <h2>Rechercher des étudiants</h2>

    <form method="get" action="">
        <label for="classe">Classe</label>
        <select id="classe" name="classe">
            <option value="">-- Sélectionner une classe --</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>" <?= (isset($_GET['classe']) && $_GET['classe'] == $class['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['libelle']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="annee">Année académique</label>
        <input type="text" id="annee" name="annee" placeholder="Ex: 2024-2025"
               value="<?= htmlspecialchars($_GET['annee'] ?? '') ?>">

        <button type="submit">Rechercher</button>
    </form>

    <?php if (!empty($etudiants)): ?>
        <table>
            <thead>
            <tr>
                <th>Matricule</th>
                <th>PRENOM & NOM</th>
                <th>CLASSE</th>
                <th>Niveau</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $etu): ?>
                <tr>
                    <td><?= htmlspecialchars($etu['matricule']) ?></td>
                    <td><?= htmlspecialchars($etu['nom_complet']) ?></td>
                    <td><?= htmlspecialchars($etu['libelle']) ?></td>
                    <td><?= htmlspecialchars($etu['niveau']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($_GET['classe']) || isset($_GET['annee'])): ?>
        <p>Aucun étudiant trouvé pour les critères spécifiés.</p>
    <?php endif; ?>
</div>

</body>
</html>
