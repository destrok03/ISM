<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Succès</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            padding: 30px 0 0 30px;
            align-self: flex-start;
        }

        .logo img {
            height: 70px;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 40px 60px;
            text-align: center;
        }

        .card .checkmark {
            width: 60px;
            height: 60px;
            background-color: #6a3d0d;
            color: white;
            font-size: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .card h3 {
            color: #f48c06;
            margin-bottom: 10px;
        }

        .card h1 {
            color: #f48c06;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .card p {
            color: #000;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .btn {
            background-color: #6a3d0d;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #542e09;
        }

        .footer {
            font-size: 12px;
            color: #888;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>

    <div class="logo">
        <img src="/assets/images/logo-ism.jpeg" alt="ISM Logo">
    </div>

    <div class="content">
        <div class="card">
            <div class="checkmark">✔</div>
            <h3>Compte créé avec</h3>
            <h1>Succès</h1>
            <p>Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter à votre compte.</p>
            <a href="/login" class="btn">Connection</a>
        </div>
    </div>

    <div class="footer">
        ©2024 Academy of Healthcare Services. All Rights Reserved.
    </div>

</body>
</html>
