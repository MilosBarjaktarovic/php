<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "web_shop";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Greška prilikom povezivanja sa bazom: " . $mysqli->connect_error);
}
?>
