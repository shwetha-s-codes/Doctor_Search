<link rel="stylesheet" href="admin.css">
<div class="admin-container">
    <h2>Admin Login</h2>

    <form method="POST">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
</div>
