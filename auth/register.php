<?php
require_once "../includes/db.php";

$message = "";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password)
              VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        $message = "Registration successful. You can now login.";
    } else {
        $message = "Email already exists.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>

    <!-- PAGE STYLES -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 80px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #003f80;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #0056b3;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>

    <?php if ($message): ?>
        <p class="message <?= strpos($message, 'successful') !== false ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </p>
    <?php endif; ?>

    <div class="login-link">
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

</body>
</html>
