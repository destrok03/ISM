<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - ISM</title>
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
            height: 95vh;
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
        }

        .right {
            flex: 1;
            background: url('/assets/images/ism-building.jpg') no-repeat center center;
            background-size: cover;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            height: 60px;
        }

        .form-box {
            max-width: 500px;
        }

        .form-box h2 {
            color: #d27900;
            margin-bottom: 25px;
            text-align: left;
            border-bottom: 3px solid #ffa733;
            display: inline-block;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-box label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .form-box input, .form-box select {
            width: 100%;
            padding: 10px;
            border: 1.5px solid #ffa733;
            border-radius: 5px;
        }

        .password-rules {
            font-size: 13px;
            color: #333;
            margin: 10px 0;
        }

        .password-rules li {
            list-style: none;
            margin-bottom: 5px;
            transition: color 0.3s;
        }

        .password-rules li.valid {
            color: green;
            font-weight: bold;
        }

        .password-rules li::before {
            content: "✔ ";
        }

        .form-box .checkbox {
            margin-top: 15px;
            font-size: 13px;
        }

        .form-box .checkbox input {
            margin-right: 5px;
        }

        .form-box .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 13px;
        }

        .form-box .actions a {
            color: #d27900;
            text-decoration: none;
        }

        .btn {
            margin-top: 25px;
            width: 100%;
            padding: 14px;
            background-color: #6a3d0d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #542e09;
        }

        .footer {
            margin-top: 30px;
            font-size: 11px;
            color: #777;
            text-align: center;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }

        @media screen and (max-width: 900px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .right {
                height: 300px;
            }

            .form-grid {
                grid-template-columns: 1fr;
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
            <h2>Sign up</h2>

            <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

            <form id="registerForm" action="/register" method="POST">
                <div class="form-grid">
                    <div>
                        <label>First name</label>
                        <input type="text" name="nom_complet" placeholder="First name" required>
                    </div>
                    <div>
                        <label>Role</label>
                        <select name="role" required>
                            <option value="admin">Administrator</option>
                            <option value="ac">AC</option>
                            <option value="etudiant">Etudiant</option>
                        </select>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div>
                        <label>Confirm password</label>
                        <input type="password" name="password_confirm" placeholder="Password" required>
                    </div>
                </div>

                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>

                <ul class="password-rules">
                    <li id="length">Minimum of 8 characters</li>
                    <li id="lowercase">One lowercase letter</li>
                    <li id="uppercase">One uppercase letter</li>
                    <li id="number">One numeric number</li>
                    <li id="special">One special character</li>
                </ul>

                <div class="checkbox">
                    <input type="checkbox" required> I agree with the <a href="#">terms</a> and <a href="#">conditions</a>.
                </div>

                <div class="actions">
                    <span>Have an account? <a href="/login">Login in here.</a></span>
                </div>

                <button class="btn" type="submit">Create Account</button>
            </form>

            <div class="footer">
                ©2024 Academy of Healthcare Services. All Rights Reserved.
            </div>
        </div>
    </div>
    <div class="right"></div>
</div>

<!-- ✅ Script de validation JS -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const form = document.getElementById('registerForm');

    const rules = {
        length: /.{8,}/,
        lowercase: /[a-z]/,
        uppercase: /[A-Z]/,
        number: /[0-9]/,
        special: /[^A-Za-z0-9]/
    };

    const validate = () => {
        const value = passwordInput.value;
        let allValid = true;

        for (const [id, regex] of Object.entries(rules)) {
            const li = document.getElementById(id);
            if (regex.test(value)) {
                li.classList.add('valid');
            } else {
                li.classList.remove('valid');
                allValid = false;
            }
        }

        return allValid;
    };

    passwordInput.addEventListener('input', validate);

    form.addEventListener('submit', function (e) {
        if (!validate()) {
            e.preventDefault();
            alert("Le mot de passe ne respecte pas tous les critères !");
        }
    });
});
</script>

</body>
</html>
