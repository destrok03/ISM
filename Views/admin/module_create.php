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
    <title>Créer un module</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f6f6f6;
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

        .search-container {
            width: 300px;
        }

        .search-container input {
            width: 100%;
            padding: 8px 14px;
            border-radius: 20px;
            border: 1px solid #ccc;
            background-color: #fcf7f0;
            box-sizing: border-box;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-box img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        h2 {
            margin-bottom: 30px;
        }

        form {
            max-width: 500px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fcf7f0;
        }

        .form-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .btn-cancel {
            padding: 10px 18px;
            background-color: #f3f0ea;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-validate {
            padding: 10px 18px;
            background-color: #d68d00;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="/assets/images/logo-ism.jpeg" alt="Logo ISM">
    <nav>
        <a href="/dashboard">Dashboard</a>
        <a href="/professeur">Teachers</a>
        <a href="/admin/demande">Demande</a>
        <a href="/classe">Classe</a>
        <a href="/module" class="active">Module</a>
    </nav>
</div>

<div class="main">
    <div class="topbar">
        <div class="search-container">
            <input type="text" class="search" placeholder="Search">
        </div>
        <div class="user-box">
            <img src="/assets/images/avatar.jpeg" alt="Avatar">
            <div><?= htmlspecialchars($nomUser) ?></div>
        </div>
    </div>

    <h2>Add New Module</h2>

    <form method="POST" action="/module/create">
        <label for="module_id">Module ID</label>
        <input type="text" name="module_id" id="module_id" placeholder="Enter Module ID" required>

        <label for="module_name">Module Name</label>
        <input type="text" name="module_name" id="module_name" placeholder="Enter Module Name" required>

        <div class="form-buttons">
            <a href="/module" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-validate">Validate</button>
        </div>
    </form>
</div>

</body>
</html>
