<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "web_shop_two";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Greška pri konekciji: " . $conn->connect_error);
}
?>
