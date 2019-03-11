<?php
// Database configuration
include 'sqlconfig.php';
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "project";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>

