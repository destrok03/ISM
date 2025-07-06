<?php
if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}
$nomUser = $_SESSION['user']['nom_complet'];

// Récupération des filtres depuis l’URL (GET)
$search = $_GET['search'] ?? '';
$filterFiliere = $_GET['filiere'] ?? '';
$filterNiveau = $_GET['niveau'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Classes</title>
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
            padding: 20px;
            height: 100vh;
            color: white;
        }
        .sidebar img {
            height: 70px;
            display: block;
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
            padding: 20px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .search-bar {
            padding: 8px 14px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 280px;
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

        .filters {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .filters select {
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-weight: bold;
        }

        .add-class {
            background-color: #cb7634;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            float: right;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5e2c6;
            color: #333;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination button {
            margin: 0 5px;
            padding: 8px 14px;
            border: none;
            background-color: #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .pagination button.active {
            background-color: #c07e3d;
            color: white;
        }

        .form-ajout {
            margin-top: 25px;
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            display: none;
        }

        .form-ajout input {
            padding: 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            width: 30%;
        }

        .form-ajout button {
            padding: 10px 18px;
            background-color: #6a3d0d;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="/assets/images/logo-ism.jpeg" alt="ISM Logo">
    <nav>
        <a href="/dashboard" class="active">Dashboard</a>
        <a href="/professeur">Teachers</a>
        <a href="/admin/demande">Demande</a>
        <a href="/classe">Classe</a>
        <a href="/module">Module</a>
    </nav>
</div>

<div class="main">
    <div class="topbar">
        <form method="GET" action="/classe">
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="search-bar" placeholder="Search...">
        </form>
        <div class="user-info">
            <img src="/assets/images/avatar.jpeg" alt="Avatar">
            <span><?= htmlspecialchars($nomUser) ?></span>
        </div>
    </div>

    <h2>Classes</h2>

    <form method="GET" class="filters">
        <label>FILIÈRE :
            <select name="filiere" onchange="this.form.submit()">
                <option value="">Toutes</option>
                <option value="Glrs" <?= $filterFiliere === 'Glrs' ? 'selected' : '' ?>>Glrs</option>
                <option value="Dev" <?= $filterFiliere === 'Dev' ? 'selected' : '' ?>>Dev</option>
                <option value="Info" <?= $filterFiliere === 'Info' ? 'selected' : '' ?>>Info</option>
            </select>
        </label>
        <label>NIVEAU :
            <select name="niveau" onchange="this.form.submit()">
                <option value="">Tous</option>
                <option value="L1" <?= $filterNiveau === 'L1' ? 'selected' : '' ?>>L1</option>
                <option value="L2" <?= $filterNiveau === 'L2' ? 'selected' : '' ?>>L2</option>
                <option value="L3" <?= $filterNiveau === 'L3' ? 'selected' : '' ?>>L3</option>
            </select>
        </label>
    </form>

    <button class="add-class" onclick="document.getElementById('formClasse').style.display='block'">+ New classe</button>

    <div id="formClasse" class="form-ajout">
        <form method="POST" action="/classe/create">
            <input type="text" name="libelle" placeholder="Libellé" required>
            <input type="text" name="nomfiliere" placeholder="Nom filière" required>
            <input type="text" name="niveau" placeholder="Niveau" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>

    <table>
        <thead>
        <tr>
            <th>Libellé</th>
            <th>Nom filière</th>
            <th>Niveau</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $classe): ?>
            <tr>
                <td><?= htmlspecialchars($classe['libelle']) ?></td>
                <td><?= htmlspecialchars($classe['nomfiliere']) ?></td>
                <td><?= htmlspecialchars($classe['niveau']) ?></td>
                <td>Étudiant</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination">
        <button class="active">1</button>
        <button>2</button>
        <button>Suivant</button>
    </div>
</div>

</body>
</html>
