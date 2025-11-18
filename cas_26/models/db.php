<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "php_23";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}
?>
