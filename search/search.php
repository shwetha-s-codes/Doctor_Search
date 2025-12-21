<?php
include "db.php";

$specialization = $_GET['specialization'] ?? '';
$location = $_GET['location'] ?? '';

$query = "SELECT * FROM doctors WHERE 1";

if (!empty($specialization)) {
    $query .= " AND specialization LIKE '%$specialization%'";
}

if (!empty($location)) {
    $query .= " AND location LIKE '%$location%'";
}

$result = mysqli_query($conn, $query);
?>

<form method="GET">
    <input type="text" name="specialization" placeholder="Specialization">
    <input type="text" name="location" placeholder="Location">
    <button type="submit">Search</button>
</form>

<h2>Results</h2>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div>
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['specialization']; ?></p>
        <p><?php echo $row['location']; ?></p>
    </div>
<?php } ?>
