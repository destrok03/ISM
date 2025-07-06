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
    <title>Accueil AC</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }

        header {
            background-color: #fff;
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
        }

        header .left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header .left img {
            height: 40px;
        }

        header .right a {
            margin: 0 10px;
            text-decoration: none;
            color: #5c2e00;
            font-weight: bold;
        }

        .container {
            padding: 40px;
        }

        h2 {
            margin-top: 0;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .button {
            background-color: #884a14;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 18px 25px;
            font-weight: bold;
            text-align: center;
            width: 180px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .button:hover {
            background-color: #a55b1f;
        }

        .welcome {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .quick-actions {
            font-size: 16px;
            font-weight: bold;
        }

    </style>
</head>
<body>

<header>
    <div class="left">
        <img src="/assets/images/logo-ism.jpeg" alt="ISM Logo">
        <span><strong>ISM</strong></span>
    </div>
    <div class="right">
        <a href="/ac/home">home</a>
        <a href="/ac/inscription">inscription/réinscription</a>
        <a href="/ac/etudiants">liste les etudiants</a>
        <a href="/ac/demandes">lister les demandes</a>
        <a href="/logout"><img src="/assets/images/avatar.jpeg" alt="avatar" style="height:32px;border-radius:50%;vertical-align:middle"></a>
    </div>
</header>

<div class="container">
    <div class="welcome">Welcome, <?= htmlspecialchars($nomUser) ?></div>
    <div class="quick-actions">Quick Actions</div>

    <div class="buttons">
        <a href="/ac/inscription" class="button">Inscriptions/ réinscriptions</a>
        <a href="/ac/etudiants" class="button">Liste étudiants<br>par classe/année</a>
        <a href="/ac/demandes" class="button">Gestion des demandes</a>
        <a href="/logout" class="button">Déconnexion</a>
    </div>
</div>

</body>
</html>
