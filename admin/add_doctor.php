<link rel="stylesheet" href="admin.css">

<div class="admin-container">
    <h2>Add Doctor</h2>

    <form method="POST">
        <input name="name" placeholder="Doctor Name" required>
        <input name="specialization" placeholder="Specialization" required>
        <input name="location" placeholder="Location" required>
        <button name="add">Add Doctor</button>
    </form>

    <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
</div>
