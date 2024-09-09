<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        /* Background image with decreased opacity */
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('bg4.png') center/cover no-repeat;
            opacity: 0.6; /* Adjust the opacity value here */
            z-index: 0;
        }

        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-in-out;
        }

        .container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 28px;
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

        .btn-primary, .btn-secondary {
            background: linear-gradient(135deg, #5996EB, #5996EB);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover, .btn-secondary:hover {
            background: linear-gradient(135deg, #000, #000);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #5996EB, #5996EB);
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .alert {
            margin-bottom: 20px;
        }

        .registration-link {
            margin-top: 15px;
        }

        .registration-link a {
            color: #004d40;
            text-decoration: none;
            font-weight: bold;
        }

        .registration-link a:hover {
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Janseva Registration</h2>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            header("Location: index.php");
            exit();
        }

        if (isset($_POST["submit"])) {
            $fullName = isset($_POST["Fullname"]) ? $_POST["Fullname"] : '';
            $email = isset($_POST["email"]) ? $_POST["email"] : '';
            $password = isset($_POST["password"]) ? $_POST["password"] : '';
            $passwordRepeat = isset($_POST["repeat_password"]) ? $_POST["repeat_password"] : '';

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
                array_push($errors, "All fields are required.");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid.");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long.");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Passwords do not match.");
            }
            require_once "database.php";

            // Use prepared statement for the SELECT query
            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $rowCount = mysqli_num_rows($result);

                if ($rowCount > 0) {
                    array_push($errors, "Email already exists!");
                }
            } else {
                array_push($errors, "Database error.");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO user (fullName, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong. Please try again.");
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="Fullname" placeholder="Full Name:" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:" required>
            </div>
            <div class="btn-group">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
                <a href="login.php" class="btn btn-secondary">Login</a>
            </div>
        </form>
    </div>
    <div class="footer">
        &copy; 2024 Janseva Urban Corporation. All rights reserved.
    </div>
</body>
</html>
