<?php
// db_connection.php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "diary_db"; // make sure this matches your database name

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
