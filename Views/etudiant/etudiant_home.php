<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit;
}

$nomUser = $_SESSION['user']['nom_complet'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8fbfd;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fff;
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        header img {
            height: 50px;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #4d2600;
            font-weight: bold;
        }

        .container {
            text-align: center;
            margin-top: 100px;
        }

        h1 {
            color: #333;
        }

        .actions {
            margin-top: 40px;
        }

        .actions button {
            background-color: #8a4b12;
            color: white;
            border: none;
            padding: 15px 25px;
            margin: 10px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #a45e20;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<header>
    <img src="/assets/images/logo-ism.jpeg" alt="ISM Logo">
    <nav>
        <a href="/etudiant/home">Home</a>
        <a href="/demande/create">Submit Request</a>
        <a href="/demande/list">View Request</a>
    </nav>
    <div class="user-info">
        <span><?= htmlspecialchars($nomUser) ?></span>
        <img src="/assets/images/avatar.jpeg" alt="Avatar">
    </div>
</header>

<div class="container">
    <h1>Welcome, <?= htmlspecialchars($nomUser) ?>,</h1>
    <h3>Quick Actions</h3>
    <div class="actions">
        <a href="/demande/create"><button>soumettre une demande</button></a>
        <a href="/demande/list"><button>voir ses demandes</button></a>
        <a href="/logout"><button>se déconnecter</button></a>
    </div>
</div>

</body>
</html>
