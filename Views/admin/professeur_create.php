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
    <title>Ajouter un professeur</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f5f5f5;
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
            padding: 8px 14px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 280px;
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
            max-width: 600px;
        }
        input[type="text"], select {
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
        .btn-cancel, .btn-submit {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #dcd2c4;
        }
        .btn-submit {
            background-color: #8a4b12;
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="/assets/images/logo-ism.jpeg" alt="Logo ISM">
    <nav>
        <a href="/dashboard">Dashboard</a>
        <a href="/professeur" class="active">Teachers</a>
        <a href="/demande">Demande</a>
        <a href="/classe">Classe</a>
        <a href="/module">Module</a>
    </nav>
</div>

<div class="main">
    <div class="topbar">
        <input type="text" class="search-bar" placeholder="Search">
        <div class="user-box">
            <img src="/assets/images/avatar.jpeg" alt="Avatar">
            <div><?= htmlspecialchars($nomUser) ?></div>
        </div>
    </div>

    <h2>Add Professor</h2>

    <form action="/professeur/create" method="POST">
        <label>ID</label>
        <input type="text" name="id" placeholder="Enter ID" required>

        <label>Full Name</label>
        <input type="text" name="nom_complet" placeholder="Enter Full Name" required>

        <label>Grade</label>
        <input type="text" name="grade" placeholder="Enter Grade" required>

        <label>Address</label>
        <input type="text" name="adresse" placeholder="Enter Address" required>

        

        <label>Assign Modules (Optional)</label>
        <select name="modules[]" multiple>
            <?php foreach ($modules as $m): ?>
                <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['nom']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Assign Classes (Optional)</label>
        <select name="classes[]" multiple>
            <?php foreach ($classes as $c): ?>
                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['libelle']) ?></option>
            <?php endforeach; ?>
        </select>

        <div class="form-buttons">
            <a href="/professeur" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
