<?php
$host = "localhost"; // Change this if your MySQL server is running on a different host
$username = "root";   // Your MySQL username
$password = "";       // Your MySQL password
$database = "database1"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
