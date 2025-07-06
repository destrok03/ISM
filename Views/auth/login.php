<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ISM</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f9f9f9;
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            height: 90vh;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .left {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .right {
            flex: 1;
            background: url('/assets/images/ism-building.jpg') no-repeat center center;
            background-size: cover;
        }

        .logo {
            align-self: flex-start;
            margin-bottom: 30px;
        }

        .logo img {
            height: 60px;
        }

        .form-box {
            width: 100%;
            max-width: 350px;
            padding: 30px;
        }

        .form-box h2 {
            color: #d27900;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 3px solid #ffa733;
            display: inline-block;
        }

        .form-box label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-box input[type="text"],
        .form-box input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ffa733;
            border-radius: 6px;
            outline: none;
        }

        .form-box .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .form-box .options a {
            color: #333;
            text-decoration: none;
        }

        .form-box .btn {
            width: 100%;
            padding: 14px;
            background-color: #6a3d0d;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-box .btn:hover {
            background-color: #542e09;
        }

        .form-box .bottom-text {
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
        }

        @media screen and (max-width: 900px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .right {
                height: 300px;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="logo">
                <img src="/assets/images/logo-ism.jpeg" alt="ISM Logo">
            </div>
            <div class="form-box">
                <h2>Login</h2>

                <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

                <form action="/login" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>

                    <div class="options">
                        <label><input type="checkbox"> Remember me</label>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <button class="btn" type="submit">Login</button>
                </form>

                <div class="bottom-text">
                    Don’t have an account? <a href="/register">Create an account.</a>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </div>
</body>
</html>
