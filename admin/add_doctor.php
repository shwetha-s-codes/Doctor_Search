<?php
session_start();
require_once "../includes/db.php";

/* Protect admin page */
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

$success = "";
$error = "";

if (isset($_POST['add'])) {
    $name = trim($_POST['name']);
    $specialization = trim($_POST['specialization']);
    $location = trim($_POST['location']);

    if ($name === "" || $specialization === "" || $location === "") {
        $error = "All fields are required";
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO doctors (name, specialization, location) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $name, $specialization, $location);

        if ($stmt->execute()) {
            $success = "Doctor added successfully";
        } else {
            $error = "Failed to add doctor";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="admin-container">
    <h2>Add Doctor</h2>

    <form method="POST">
        <input name="name" placeholder="Doctor Name" required>
        <input name="specialization" placeholder="Specialization" required>
        <input name="location" placeholder="Location" required>
        <button type="submit" name="add">Add Doctor</button>
    </form>

    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</div>

</body>
</html>
