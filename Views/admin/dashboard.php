<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}
$nomUser = $_SESSION['user']['nom_complet'];


$nbEtudiants = $nbEtudiants ?? 0;
$nbProfesseurs = $nbProfesseurs ?? 0;
$nbModules = $nbModules ?? 0;
$statsParNiveau = $statsParNiveau ?? [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #b71c1c;
        }

        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
        }

        .stat-card h3 {
            margin: 0;
            font-size: 26px;
        }

        .stat-card p {
            margin: 8px 0 0;
            color: #555;
        }

        .welcome-box {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .welcome-box a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 16px;
            background-color: #3d5afe;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }

        .chart-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="/assets/images/logo-ism.jpeg" alt="Logo ISM">
    <nav>
        <a href="/dashboard" class="active">Dashboard</a>
        <a href="/professeur">Teachers</a>
        <a href="/classe">Classe</a>
        <a href="/admin/demande">Demande</a>
        <a href="/module">Module</a>
    </nav>
</div>

<div class="main">
    <div class="topbar">
        <input type="text" class="search-bar" placeholder="Search">
        <div class="user-info">
            <img src="/assets/images/avatar.jpeg" alt="Avatar">
            <div><?= htmlspecialchars($nomUser) ?></div>
            <a href="/logout" class="logout-btn">Déconnexion</a>
        </div>
    </div>

    <h2>Dashboard</h2>

    <div class="stats">
        <div class="stat-card">
            <h3><?= $nbEtudiants ?></h3>
            <p>Total Students</p>
        </div>
        <div class="stat-card">
            <h3><?= $nbProfesseurs ?></h3>
            <p>Total Teachers</p>
        </div>
        <div class="stat-card">
            <h3><?= $nbModules ?></h3>
            <p>Total Modules</p>
        </div>
    </div>

    <?php if (!empty($statsParNiveau)): ?>
        <div class="chart-container">
            <h3>Nombre d’étudiants par niveau</h3>
            <canvas id="chartNiveau" width="600" height="300"></canvas>
        </div>

        <script>
            const ctx = document.getElementById('chartNiveau').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($statsParNiveau)) ?>,
                    datasets: [{
                        label: "Étudiants",
                        data: <?= json_encode(array_values($statsParNiveau)) ?>,
                        backgroundColor: '#ff9800'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    <?php endif; ?>
</div>

</body>
</html>
