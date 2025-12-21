<?php
$config = require __DIR__ . '/config.php';

$conn = mysqli_connect(
    $config['DB_HOST'],
    $config['DB_USER'],
    $config['DB_PASS'],
    $config['DB_NAME']
);

if (!$conn) {
    die("Database connection failed");
}
