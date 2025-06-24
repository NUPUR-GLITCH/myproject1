<?php
$host = 'localhost';
$dbname = 'myproject_db';
$username = 'root'; // Adjust if you have a different MySQL username
$password = ''; // Adjust if you have a MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create contact_submissions table if it doesn't exist
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS contact_submissions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            submitted_at DATETIME NOT NULL
        )
    ");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>