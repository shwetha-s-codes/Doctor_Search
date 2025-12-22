<?php
session_start();
require_once "../includes/db.php";

$error = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === "" || $password === "") {
        $error = "All fields are required";
    } else {
        // Simple credential check (no hashing)
        $stmt = $conn->prepare(
            "SELECT id FROM admins WHERE username = ? AND password = ?"
        );
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: admin_dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="admin-container">
    <h2>Admin Login</h2>

    <form method="POST">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</div>

</body>
</html>
