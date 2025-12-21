<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>

<h1>Welcome to Doctor Search</h1>
<a href="search.php">Search Doctors</a>
<a href="includes/logout.php">Logout</a>
