<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Leave blank in XAMPP
$dbname = "spacefinder"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
