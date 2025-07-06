<?php
if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un Module</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #8a4b12;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }

        input[type="text"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

        .actions button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: #ccc;
            color: #333;
        }

        .btn-validate {
            background-color: #8a4b12;
            color: white;
        }

        .btn-validate:hover {
            background-color: #6a3d0d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Créer un Module</h2>
        <form action="/module/create" method="POST">
            <label for="id">Module ID</label>
            <input type="text" name="id" id="id" required>

            <label for="nom">Nom du Module</label>
            <input type="text" name="nom" id="nom" required>

            <div class="actions">
                <a href="/module" class="btn-cancel" style="text-decoration: none; padding: 12px 24px; border-radius: 6px;">Annuler</a>
                <button type="submit" class="btn-validate">Valider</button>
            </div>
        </form>
    </div>
</body>
</html>
