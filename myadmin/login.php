<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
            position: relative;
        }

        /* Background image with decreased opacity */
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("bg4.png") center/cover no-repeat;
            opacity: 0.6; /* Adjust the opacity value here */
            z-index: 0;
        }

        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .login-container img {
            width: 120px;
            margin-bottom: 20px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 24px;
            color: #5996EB;
        }

        .form-control {
            border: 1px solid #004d40;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #003d33;
            box-shadow: 0 0 8px rgba(0, 61, 51, 0.3);
        }

        .btn-primary {
            background-color: #5996EB;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            color: #ffffff;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: black;
            transform: scale(1.05);
        }

        .alert {
            margin-bottom: 20px;
        }

        .login-container .registration-link {
            margin-top: 15px;
        }

        .login-container .registration-link a {
            color: #5996EB;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container .registration-link a:hover {
            text-decoration: underline;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #ffffff;
            font-size: 14px;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Bank Login</h2>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            header("Location: dash.php");
        }

        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user"] = "yes";
                    header("Location: dash.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" value="Login" name="login" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
        <div class="registration-link">
            <p>Not registered yet? <a href="registration.php">Register here</a></p>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 Janseva Urban Corporation. All rights reserved.
    </div>
</body>
</html>
