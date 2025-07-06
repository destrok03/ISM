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
    <title>Gestion des demandes</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 230px;
            background-color: #894b13;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        .sidebar img {
            height: 60px;
            margin-bottom: 40px;
        }

        .sidebar nav a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 12px 0;
            padding: 10px;
            border-radius: 6px;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background-color: #c0742c;
        }

        .main {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .search-bar {
            padding: 10px 15px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 300px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .logout-btn {
            background-color: #d32f2f;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #b71c1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
        }

        .pending {
            background-color: #eee;
            color: #333;
        }

        .accepted {
            background-color: #d4edda;
            color: #155724;
        }

        .rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .actions form {
            display: inline-block;
            margin: 0;
        }

        .actions button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
            font-weight: bold;
            padding: 0;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <img src="/assets/images/logo-ism.jpeg" alt="Logo ISM">
    <nav>
        <a href="/dashboard">Dashboard</a>
        <a href="/professeur">Teachers</a>
        <a href="/classe">Classe</a>
        <a href="/admin/demande" class="active">Demande</a>
        <a href="/module">Module</a>
    </nav>
</div>

<!-- Main content -->
<div class="main">
    <!-- Topbar -->
    <div class="topbar">
        <input type="text" class="search-bar" placeholder="Search">
        <div class="user-info">
            <img src="/assets/images/avatar.jpeg" alt="Avatar">
            <div><?= htmlspecialchars($nomUser) ?></div>
            <a href="/logout" class="logout-btn">Déconnexion</a>
        </div>
    </div>

    <h2>Demandes de suspension/annulation</h2>

    <table>
        <thead>
            <tr>
                <th>ID de la demande</th>
                <th>ID de l’étudiant</th>
                <th>Nom et prénom</th>
                <th>Type de demande</th>
                <th>Motif</th>
                <th>Date de la demande</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demandes as $demande): ?>
                <tr>
                    <td>#<?= $demande['id'] ?></td>
                    <td><?= $demande['matricule'] ?? '-' ?></td>
                    <td><?= $demande['nom_complet'] ?></td>
                    <td><?= $demande['type_demande'] ?></td>
                    <td><?= $demande['raison'] ?></td>
                    <td><?= $demande['date_demande'] ?></td>
                    <td>
                        <span class="badge 
                            <?= $demande['statut'] === 'Accepted' ? 'accepted' : ($demande['statut'] === 'Rejected' ? 'rejected' : 'pending') ?>">
                            <?= ucfirst($demande['statut']) ?>
                        </span>
                    </td>
                    <td class="actions">
                        <?php if ($demande['statut'] === 'Pending'): ?>
                            <form action="/admin/demande/update" method="POST">
                                <input type="hidden" name="id" value="<?= $demande['id'] ?>">
                                <input type="hidden" name="statut" value="Accepted">
                                <button type="submit">Accepter</button>
                            </form>
                            <form action="/admin/demande/update" method="POST">
                                <input type="hidden" name="id" value="<?= $demande['id'] ?>">
                                <input type="hidden" name="statut" value="Rejected">
                                <button type="submit">Refuser</button>
                            </form>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
