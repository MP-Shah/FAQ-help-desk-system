<?php
// login.php

// Get form data from POST request

// Database connection details
$host = 'localhost';  // MySQL server (usually localhost)
$db = 'user_login_system';  // Database name
$user = 'root';  // MySQL username
$pass = 'root';  // MySQL password (replace with your password)

// Create a connection to the MySQL database
$conn =  mysqli_connect($host, $user, $pass, $db);

// // Check for connection errors
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
    
// }
?>