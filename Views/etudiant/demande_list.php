<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes demandes</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f9fafc;
            margin: 0;
            padding: 0;
        }

        header {
            background: white;
            border-bottom: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 30px;
        }

        header img.logo {
            height: 45px;
        }

        nav a {
            margin: 0 15px;
            color: #6b3c0d;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .profile-icon img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .container {
            padding: 30px 60px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #2e2e2e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 16px;
            border-bottom: 1px solid #e5e5e5;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
        }

        .status-btn {
            padding: 6px 14px;
            border: none;
            border-radius: 20px;
            font-size: 14px;
            color: white;
            font-weight: bold;
            cursor: default;
        }

        .status-btn.Pending {
            background-color: #e67e22;
        }

        .status-btn.Accepted {
            background-color: #2ecc71;
        }

        .status-btn.Refused {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

<header>
    <img src="/assets/images/logo-ism.jpeg" alt="Logo ISM" class="logo">
    <nav>
        <a href="/etudiant">Home</a>
        <a href="/demande/create">Soumettre une demande</a>
        <a href="/demande/list">Voir mes demandes</a>
    </nav>
    <div class="profile-icon">
        <img src="/assets/images/avatar.jpeg" alt="Profil">
    </div>
</header>

<div class="container">
    <h2>Mes demandes</h2>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Raison</th>
            <th>Date de soumission</th>
            <th>Statut</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($demandes as $demande): ?>
            <tr>
                <td><?= htmlspecialchars($demande['id']) ?></td>
                <td><?= htmlspecialchars($demande['type_demande']) ?></td>
                <td><?= htmlspecialchars($demande['raison']) ?></td>
                <td><?= htmlspecialchars($demande['date_demande']) ?></td>
                <td>
                    <button class="status-btn <?= ucfirst($demande['statut']) ?>">
                        <?= ucfirst($demande['statut']) ?>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
