<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Nouvelle Demande</title>
    <style>
        body {
            background-color: #f7f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: #fff;
            padding: 15px 30px;
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
            color: #5e3208;
            font-weight: bold;
        }

        .container {
            padding: 40px 60px;
        }

        h2 {
            color: #222;
            margin-bottom: 25px;
        }

        form {
            max-width: 500px;
        }

        select,
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #834c13;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .success {
            color: green;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<header>
    <img src="/assets/images/logo-ism.jpeg" alt="Logo ISM">
    <nav>
        <a href="/etudiant">Home</a>
        <a href="/demande/list">View Request</a>
    </nav>
    <div>
        <img src="/assets/images/avatar.jpeg" alt="Profil" width="35" style="border-radius: 50%;">
    </div>
</header>

<div class="container">
    <h2>New Request</h2>

    <?php if (isset($_GET['success'])): ?>
        <p class="success">Demande soumise avec succès !</p>
    <?php endif; ?>

    <form action="/demande/store" method="POST">
        <label for="type_demande">Type de demande</label>
        <select name="type_demande" id="type_demande" required>
            <option value="">Select request type</option>
            <option value="Absence">Absence</option>
            <option value="Changement de programme">Changement de programme</option>
            <option value="Certificat de scolarité">Certificat de scolarité</option>
        </select>

        <label>Reason</label>
        <textarea name="raison" rows="5" required></textarea>

        <label>Date</label>
        <input type="date" name="date_demande" required>

        <button type="submit">soumettre...</button>
    </form>
</div>

</body>
</html>
