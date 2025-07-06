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
    <title>Formulaire d'inscription</title>
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
            max-width: 600px;
            margin: auto;
        }

        h2 {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 15px 0 6px;
            font-weight: bold;
        }

        select,
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            background-color: #884a14;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #a55b1f;
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
            <a href="/ac/inscription">inscription/reinscription</a>
            <a href="/ac/etudiants">liste les etudiants</a>
            <a href="/ac/demandes">lister les demandes</a>
            <a href="/logout"><img src="/assets/images/avatar.jpeg" alt="avatar"
                    style="height:32px;border-radius:50%;vertical-align:middle"></a>
        </div>
    </header>

    <div class="container">
        <h2>formulaire inscription/reinscription</h2>

        <!-- ... (tout le reste inchangé) -->

        <form action="/ac/inscription/submit" method="post">
            <label for="matricule">Matricule étudiant</label>
            <input type="text" id="matricule" name="matricule" placeholder="ex: 2024ET001" required>

            <label for="nom_complet">Nom complet</label>
            <input type="text" id="nom_complet" name="nom_complet" placeholder="ex: Jean Dupont" required>

            <label for="email">Email de l'étudiant</label>
            <input type="email" id="email" name="email" placeholder="ex: etudiant@example.com" required>

            <label for="classe">Classe</label>
            <select id="classe" name="classe_id" required>
                <option value="">Select Class</option>
                <?php foreach ($classes as $classe): ?>
                    <option value="<?= $classe['id'] ?>"><?= htmlspecialchars($classe['libelle']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="annee">Année académique</label>
            <select id="annee" name="annee_academique" required>
                <option value="">Select</option>
                <option value="2024-2025">2024-2025</option>
                <option value="2025-2026">2025-2026</option>
            </select>

            <label for="type">Type d'inscription</label>
            <select id="type" name="type_inscription" required>
                <option value="">Select Type</option>
                <option value="inscription">Inscription</option>
                <option value="reinscription">Réinscription</option>
            </select>

            <label for="niveau">Niveau</label>
            <select id="niveau" name="niveau" required>
                <option value="">Select Niveau</option>
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>

            <button type="submit">Submit</button>
        </form>

    </div>

</body>

</html>