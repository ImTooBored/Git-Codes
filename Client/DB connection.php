<?php
// Database connection parameters
$db_host = '213.171.200.31';
$db_name = 'calvoK';
$db_user = 'IScalvoK';
$db_pass = '20Ca7^o23';

// Create a MySQLi database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>