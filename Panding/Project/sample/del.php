<?php
include "connection.php";

$studentid = $_GET['id'];
$query = "select std_image from students where std_id = $studentid";
$rs = mysqli_query($conn, $query);
$row = mysqli_fetch_array($rs);
$name = $row['std_image'];
unlink("uphoto/" . $name);


$query = "delete from students where std_id=$studentid";
mysqli_query($conn, $query);
header("location:select.php");

?>
