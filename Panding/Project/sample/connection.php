<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "db_students";
$servername = "localhost";
$username = "root";
$password = "";
$database = "next_apartment_db";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn) {
    echo "connection done";
}

?>