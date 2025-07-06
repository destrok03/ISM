<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ac') {
    header("Location: /login");
    exit;
}

$nomUser = $_SESSION['user']['nom_complet'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Lister les demandes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fafafa;
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

        .search-bar {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 350px;
            padding: 10px;
            border: 1px solid #a15a13;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #804000;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            padding: 14px;
            border: 1px solid #e0c9ac;
            text-align: left;
        }

        th {
            background-color: #f4e9dd;
        }

        .status-btn {
            padding: 6px 14px;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        .Accepted {
            background-color: #814a0e;
        }

        .Rejected {
            background-color: #c0392b;
        }

        .Pending {
            background-color: #a15a13;
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
            <a href="/ac/etudiants">liste les étudiants</a>
            <a href="/ac/demandes">lister les demandes</a>
            <img src="/assets/images/avatar.jpeg" alt="avatar" style="height: 32px; vertical-align: middle; margin-left: 10px;">
        </div>
    </header>

    <div class="container">
        <h2>Rechercher des demandes</h2>

        <form method="get" class="search-bar">
            <input type="text" name="matricule" placeholder="Entrer le matricule de l'étudiant"
                value="<?= htmlspecialchars($_GET['matricule'] ?? '') ?>">
            <button type="submit">Rechercher</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Type de demande</th>
                    <th>Motif</th>
                    <th>Date</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($demandes)): ?>
                    <?php foreach ($demandes as $demande): ?>
                        <tr>
                            <td><?= htmlspecialchars($demande['type_demande']) ?></td>
                            <td><?= htmlspecialchars($demande['raison']) ?></td>
                            <td><?= htmlspecialchars($demande['date_demande']) ?></td>
                            <td><button class="status-btn <?= $demande['statut'] ?>">
                                <?= ucfirst($demande['statut']) ?></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">Aucune demande trouvée.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
