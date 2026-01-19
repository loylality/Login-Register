<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "user_system"; // নিশ্চিত করো স্পেস নেই

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

