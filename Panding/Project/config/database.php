<?php
// echo "Hello"
// Database configuration
$host = "localhost";
// $server = "localhost"
$username = "root";
$password = "";
$database = "next_apartment_db";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);
// $con = mysqli_connect($server, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// if (!$con) {
//     die("Connection failed to this database: " . 
//     mysqli_connect_error());
// }

// Set character set
$conn->set_charset("utf8mb4");
// eceho "sucess connection to the db";
?>
