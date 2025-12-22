<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../includes/db.php";

$specialization = $_GET['specialization'] ?? '';
$location = $_GET['location'] ?? '';

$query = "SELECT * FROM doctors WHERE 1";

if (!empty($specialization)) {
    $query .= " AND specialization LIKE '%" . mysqli_real_escape_string($conn, $specialization) . "%'";
}

if (!empty($location)) {
    $query .= " AND location LIKE '%" . mysqli_real_escape_string($conn, $location) . "%'";
}

$result = mysqli_query($conn, $query);
$hasSearch = !empty($specialization) || !empty($location);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Doctors</title>

    <!-- PAGE STYLES -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #0056b3;
        }

        /* Search Form */
        .search-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .search-form input {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-form button {
            padding: 10px 20px;
            background: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background: #003f80;
        }

        /* Doctor Cards */
        .results {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .doctor-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .doctor-card h3 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .no-results {
            text-align: center;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Doctor Search</h1>

    <!-- SEARCH FORM -->
    <form class="search-form" method="GET">
        <input type="text" name="specialization" placeholder="Specialization"
               value="<?= htmlspecialchars($specialization) ?>">
        <input type="text" name="location" placeholder="Location"
               value="<?= htmlspecialchars($location) ?>">
        <button type="submit">Search</button>
    </form>

    <!-- RESULTS -->
    <?php if ($hasSearch): ?>
        <h2>Results</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="results">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="doctor-card">
                        <h3><?= htmlspecialchars($row['name']) ?></h3>
                        <p><strong>Specialization:</strong> <?= htmlspecialchars($row['specialization']) ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="no-results">No doctors found. Try a different specialization or location.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
